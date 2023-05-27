<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Kelas;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use Auth;

class PeminjamanController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjamanRequest $request)
    {
        //
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
        $data = Peminjaman::findOrFail($id)->toArray();
        $kelas = Kelas::select('id', 'nama')->where('sekolah_id', Auth::user()->sekolah_id)->get();
        return view('peminjaman.form', compact('data', 'kelas'));
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
        // DB::beginTransaction();
        // try {
            $tahun_ajaran = getTahunAjaran();
            $data = [
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'email' => $request->email,
                'kelas_id' => $request->kelas,
                'tahun_ajaran_id' => $tahun_ajaran->id,
                'kategori_id' => $request->kategori_id,
                'sekolah_id' => decodeText($request->identifier)['identifier'],
                'kode' => $this->genereate_kode(decodeText($request->identifier)['identifier'])
            ];
            
            if ($request->jenis == 'sarana') {
                $request->validate([
                    'sub_kategori_id' => 'required',
                    'jml_peminjaman' => 'required',
                ]);

                $data += [
                    'sub_kategori_id' => $request->sub_kategori_id,
                    'jml_peminjaman' => $request->jml_peminjaman,
                ];
            }else{
                $request->validate([
                    'ruang_id' => 'required',
                ]);

                $data += [
                    'ruang_id' => $request->ruang_id
                ];
            }

            $peminjaman = Peminjaman::create($data);
            Mail::to($request->email)->send(new PeminjamanMail(encodeText($peminjaman->kode)));
        //     DB::commit();
        //     return response()->json([
        //         'message' => 'Berhasil dikirim'
        //     ], 200);
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return response()->json([
        //         'message' => 'Gagal'
        //     ], 401);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
