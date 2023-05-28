<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Kelas;
use App\Models\Produk;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use Auth, DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PeminjamanMail;
use App\Mail\PenagihanMail;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_peminjaman', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_peminjaman', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_peminjaman', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_peminjaman', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Peminjaman::where('sekolah_id', Auth::user()->sekolah_id)->latest()->get();
        return view('peminjaman.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'admin';
        $kelas = Kelas::select('id', 'nama')->where('sekolah_id', Auth::user()->sekolah_id)->get();
        return view('peminjaman.form', [
            'kelas' => $kelas,
            'page' => $page,
        ]);
    }

    private function genereate_kode($sekolah_id){
        $last = Peminjaman::where('sekolah_id', $sekolah_id)->orderByDesc('id')->first();
        $kode = 'PM' . $sekolah_id . sprintf('%0'. 5 .'d', ($last ? ((int)explode('PM' . $sekolah_id, $last->kode)[1] + 1) : 1));
        return $kode;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjamanRequest $request)
    {
        DB::beginTransaction();
        try {
            $tahun_ajaran = getTahunAjaran();
            $data = [
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'email' => $request->email,
                'kelas_id' => $request->kelas,
                'kategori_id' => $request->kategori_id,
                'status' => $request->status,
                'ket' => $request->ket,
                'sekolah_id' => Auth::user()->sekolah_id,
                'tahun_ajaran_id' => $tahun_ajaran->id,
                'kode' => $this->genereate_kode(Auth::user()->sekolah_id)
            ];

            if ($request->status == 'diterima') {
                $request->validate([
                    'tgl_peminjaman' => 'required',
                    'tgl_pengembalian' => 'required',
                    'image_peminjaman' => 'required',
                    'ttd' => 'required'
                ]);

                $data += [
                    'tgl_peminjaman' => $request->tgl_peminjaman,
                    'tgl_pengembalian' => $request->tgl_pengembalian,
                ];
            }

            if ($request->image_peminjaman) {
                $data['foto_peminjaman'] = $this->uploadImage($request->image_peminjaman, 'foto_peminjaman');
            }
            
            if ($request->image_pengembalian) {
                $data['foto_pengembalian'] = $this->uploadImage($request->image_pengembalian, 'foto_pengembalian');
            }

            if ($request->ttd) {
                $data['ttd'] = $this->uploadImage($request->ttd, 'ttd');
            }

            if ($request->jenis == 'sarana') {
                if ($request->status == 'diterima') {
                    if (count($request->produk_id) > 0) {
                        $produk = DB::table('produks')->where('id', $request->produk_id[0])->first();
                        if (!$produk->sekali_pakai) {
                            $data['status_pengembalian'] = true;
                        }
                    }
                }
            }

            if ($request->status == 'ditolak') {
                $data['status_pengambalian'] = true;
            }else{
                $data['status_pengambalian'] = false;
            }

            $peminjaman = Peminjaman::create($data);

            if ($request->jenis == 'sarana') {
                $peminjaman->produks()->sync($request->produk_id);
                $update = DB::table('produks')->where(function ($query) use ($request) {
                    foreach ($request->produk_id as $key => $produk_id)
                    {
                        if ($key == 0) {
                            $query->where('id', $produk_id);
                        } else {
                            $query->orWhere('id', $produk_id);
                        }
                    }
                })->update([
                    'dipinjam' => true
                ]);
            }

            if ($request->status != 'pengajuan') {
                Mail::to($request->email)->send(new PeminjamanMail(encodeText($peminjaman->kode), $peminjaman->status, $peminjaman->ket));
            }
            DB::commit();
            return redirect()->route('peminjamans.index', $peminjaman->id)->with('msg_success', 'Berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('peminjamans.show', $peminjaman->id)->with('msg_error', 'Gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Peminjaman::findOrFail($id);
        return view('peminjaman.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = 'admin';
        $data = Peminjaman::findOrFail($id);
        $kelas = Kelas::select('id', 'nama')->where('sekolah_id', Auth::user()->sekolah_id)->get();
        return view('peminjaman.form', [
            'data' => $data->toArray(),
            'kelas' => $kelas,
            'page' => $page,
            'produks' => $data->produks->pluck('id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamanRequest  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        DB::beginTransaction();
        try {
            $old_peminjaman = $peminjaman->status;
            $data = [
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'email' => $request->email,
                'kelas_id' => $request->kelas,
                'kategori_id' => $request->kategori_id,
                'status' => $request->status,
                'ket' => $request->ket
            ];

            if ($request->status == 'diterima') {
                $request->validate([
                    'tgl_peminjaman' => 'required',
                    'tgl_pengembalian' => 'required',
                ]);
                
                if (!$peminjaman->foto_peminjaman) {
                    $request->validate([
                        'image_peminjaman' => 'required'
                    ]);
                }

                if (!$peminjaman->ttd) {
                    $request->validate([
                        'ttd' => 'required'
                    ]);
                }

                $data += [
                    'tgl_peminjaman' => $request->tgl_peminjaman,
                    'tgl_pengembalian' => $request->tgl_pengembalian,
                ];
            }

            if ($request->image_peminjaman) {
                if ($peminjaman->foto_peminjaman) {
                    File::delete('foto_peminjaman/' . $peminjaman->foto_peminjaman);
                }
                $data['foto_peminjaman'] = $this->uploadImage($request->image_peminjaman, 'foto_peminjaman');
            }
            
            if ($request->image_pengembalian) {
                if ($peminjaman->foto_pengembalian) {
                    File::delete('foto_pengembalian/' . $peminjaman->foto_pengembalian);
                }
                $data['foto_pengembalian'] = $this->uploadImage($request->image_pengembalian, 'foto_pengembalian');
            }

            if ($request->ttd) {
                if ($peminjaman->ttd) {
                    File::delete('ttd/' . $peminjaman->ttd);
                }
                $data['ttd'] = $this->uploadImage($request->ttd, 'ttd');
            }

            if ($request->jenis == 'sarana') {
                if ($request->status == 'diterima') {
                    if (count($request->produk_id) > 0) {
                        $produk = DB::table('produks')->where('id', $request->produk_id[0])->first();
                        if (!$produk->sekali_pakai) {
                            $data['status_pengembalian'] = true;
                        }
                    }
                }

                $peminjaman->produks()->sync($request->produk_id);
                $update = DB::table('produks')->where(function ($query) use ($request) {
                    foreach ($request->produk_id as $key => $produk_id)
                    {
                        if ($key == 0) {
                            $query->where('id', $produk_id);
                        } else {
                            $query->orWhere('id', $produk_id);
                        }
                    }
                })->update([
                    'dipinjam' => true
                ]);
            }

            if ($request->status == 'ditolak') {
                $data['status_pengambalian'] = true;
            }else{
                $data['status_pengambalian'] = false;
            }

            $peminjaman->update($data);

            if ($old_peminjaman != $request->status && $request->status != 'pengajuan') {
                Mail::to($request->email)->send(new PeminjamanMail(encodeText($peminjaman->kode), $peminjaman->status, $peminjaman->ket));
            }
            DB::commit();
            return redirect()->route('peminjamans.show', $peminjaman->id)->with('msg_success', 'Berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('peminjamans.show', $peminjaman->id)->with('msg_error', 'Gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
        $data = Peminjaman::findOrFail($id);
        if ($data->foto_peminjaman) {
            File::delete('foto_peminjaman/' . $data->foto_peminjaman);
        }

        if ($data->foto_pengembalian) {
            File::delete('foto_pengembalian/' . $data->foto_pengembalian);
        }

        if ($data->ttd) {
            File::delete('ttd/' . $data->ttd);
        }

        foreach ($data->produks as $key => $produk) {
            DB::table('produks')->where('id', $produk->id)->update([
                'dipinjam' => false
            ]);
        }

        $data->produks()->sync([]);
        $data->delete();
        DB::commit();
        return redirect()->back()->with('msg_success', 'Berhasil dihapus');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('msg_success', 'Gagal dihapus');
    }
    }

    public function penagihan(Request $request){
        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);
        $peminjaman->update([
            'email_penagihan' => $peminjaman->email_penagihan ? $peminjaman->email_penagihan + 1 : 1
        ]);

        Mail::to($peminjaman->email)->send(new PenagihanMail($request->pesan));
        return redirect()->back()->with('msg_success', 'Berhasil dikirim');
    }
}
