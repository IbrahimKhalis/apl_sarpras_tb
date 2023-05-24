<?php

namespace App\Http\Controllers;

use DB, Auth;
use App\Models\{
    Produk,
    Subcategory,
    Foto
};
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProdukController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_produk', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_produk', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_produk', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_produk', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = DB::table('produks')->select('produks.*')
                                        ->join('kategoris', 'kategoris.id', 'produks.kategori_id')
                                        ->where('kategoris.sekolah_id', Auth::user()->sekolah_id)
                                        ->paginate(10);
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = DB::table('kategoris')
                        ->where('sekolah_id', Auth::user()->sekolah_id)
                        ->where('jenis', 'sarana')
                        ->get();
        return view('produk.form', compact('kategoris'));
    }

    private function generate_kode($kode, $kategori, $ke){                            
        $kode_kategori = sprintf('%0'. 5 .'d', $kode);
        $result = $kategori->kode . $kode_kategori;
        return $result;
    }

    public function store(StoreProdukRequest $request)
    {
        DB::beginTransaction();
        try {
            $kategori = DB::table('kategoris')
                                ->where('id', $request->kategori_id)
                                ->first();
            $last_kategori = DB::table('produks')
                                ->where('kategori_id', $request->kategori_id)
                                ->orderByDesc('id')
                                ->first();

            $tahun_ajaran = getTahunAjararan();
                                
            for ($i = 0; $i < $request->jumlah; $i++) {
                $produk = Produk::create([
                    'sekolah_id' => Auth::user()->sekolah_id,
                    'kategori_id' => $request->kategori_id,
                    'tahun_ajaran_id' => $tahun_ajaran->id,
                    'sub_kategori_id' => $request->sub_kategori_id,
                    'nama' => ($request->name_increment ? ($request->start_increment ? ($request->nama . ' ' . $request->start_increment + $i) : ($request->nama . ' ' . $i)) : $request->nama),
                    'kode' => $this->generate_kode(($last_kategori ? (int)explode($kategori->kode, $last_kategori->kode)[1] + ($i + 1) : 1),$kategori, $i + 1),
                    'merek' => $request->merek,
                    'kondisi' => $request->kondisi,
                    'ket_produk' => $request->ket_produk,
                    'ket_kondisi' => $request->ket_kondisi,
                ]);
                
                foreach ($request->fotos as $key => $foto) {
                    $randName = Str::random(24);
                    $path = Storage::disk('public')->putFileAs('produk', $foto, $randName.'_'.$i.'.'.$foto->getClientOriginalExtension());
                    Foto::create([
                        'produk_id' => $produk->id,
                        'file' => $path
                    ]);
                }

                insertLog(Auth::user()->name . " Berhasil menambahkan produk " . $produk['nama']);
            }
            DB::commit();
            return redirect()->route('produk.index')->with('msg_success', 'Berhasil menambahkan produk');
        } catch (\Throwable $th) {
                DB::rollback();
            return redirect()->route('produk.index')->with('msg_error', 'Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        $tahun_ajaran = getTahunAjararan();
        validateSekolah($produk->sekolah_id);
        return isset($tahun_ajaran) ? $produk : abort(403);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk::findOrFail($id);
        validateSekolah($data->sekolah_id);
        $kategoris = DB::table('kategoris')
                        ->where('sekolah_id', Auth::user()->sekolah_id)
                        ->where('jenis', 'sarana')
                        ->get();
        $subcategories = DB::table('subcategories')->select('subcategories.*')
                                                    ->join('kategoris', 'kategoris.id', 'subcategories.kategori_id')
                                                    ->where('kategoris.sekolah_id', Auth::user()->sekolah_id)
                                                    ->where('subcategories.kategori_id', $data->kategori_id)
                                                    ->get();

        return view('produk.form', compact('data','kategoris', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        try {
            // $tahun_ajaran = getTahunAjararan();
            validateSekolah($produk->sekolah_id);
            $update = [
                'kategori_id' => $request->kategori_id,
                'sub_kategori_id' => $request->sub_kategori_id,
                'jurusan_id' => $request->jurusan_id,
                'nama' => $request->nama,
                'merek' => $request->merek,
                'kondisi' => $request->kondisi,
                'ket_produk' => $request->ket_produk,
                'ket_kondisi' => $request->ket_kondisi,
            ];

            if ($request->kategori_id != $produk->kategori_id) {
                $kategori = DB::table('kategoris')
                                ->where('id', $request->kategori_id)
                                ->first();
                $last_kategori = DB::table('produks')
                                    ->where('kategori_id', $request->kategori_id)
                                    ->orderByDesc('id')
                                    ->first();
                
                $update['kode'] = $this->generate_kode(($last_kategori ? (int)explode($kategori->kode, $last_kategori->kode)[1] + 1 : 1),$kategori, 1);
            }

            if(isset($request->fotos)){
                foreach ($request->fotos as $key => $foto) {
                    $path = Storage::disk('public')->putFile('produk', $foto);
                    $data = Foto::where('produk_id',$produk->id)->first();
                    if (Storage::disk('public')->exists("$data->file")) {
                        Storage::disk('public')->delete("$data->file");
                    }

                    $data->update([
                        'file' => $path
                    ]);

                }
            }

            $produk->update($update);

            insertLog(Auth::user()->name . " Berhasil mengubah produk " . $request->nama);
            return redirect()->route('produk.index')->with('msg_success', 'Berhasil mengubah produk');
        } catch (\Throwable $th) {
            return redirect()->route('produk.index')->with('msg_error', 'Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        validateSekolah($produk->sekolah_id);
        if (!$produk) {
            return response()->json([
                'message' => 'The data wanna be delete Not Found!'
            ], 400);
        }

        $produk->delete();

        insertLog(Auth::user()->name . ' Berhasil menghapus produk ' . $produk->nama);

        return redirect()->route('produk.index')->with('msg_success', 'Berhasil menghapus produk');
    }

    public function get($sub){
        $data = Subcategory::findOrFail($sub);
        return response()->json([
            'datas' => $data->produk()->whereNull('ruang_id')->get()
        ], 200);
    }
}
