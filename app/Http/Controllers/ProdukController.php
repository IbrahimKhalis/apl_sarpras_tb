<?php

namespace App\Http\Controllers;

use DB, Auth;
use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Kategori;

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
                                        ->get();
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
        $subcategories = DB::table('subcategories')->select('subcategories.*')
                                                    ->join('kategoris', 'kategoris.id', 'subcategories.kategori_id')
                                                    ->where('kategoris.sekolah_id', Auth::user()->sekolah_id)
                                                    ->get();
        $jurusans = DB::table('jurusans')
                            ->where('sekolah_id', Auth::user()->sekolah_id)
                            ->get();
        return view('produk.form', compact('kategoris', 'subcategories', 'jurusans'));
    }

    private function generate_kode($request, $ke){
        $kategori = DB::table('kategoris')
                                ->where('id', $request->kategori_id)
                                ->first();

        $last_kategori = DB::table('produks')
                                    ->where('kategori_id', $request->kategori_id)
                                    ->orderByDesc('id')
                                    ->first();

        $last_sub = DB::table('produks')
                            ->where('kategori_id', $request->kategori_id)
                            ->where('sub_kategori_id', $request->sub_kategori_id)
                            ->orderByDesc('id')
                            ->first();
                                    
        $kode_kategori = sprintf('%0'. 5 .'d', ($last_kategori ? (int)explode('-', $last_kategori->kode)[1] + 1 : 1));
        $kode_sub = sprintf('%0'. 5 .'d', ($last_sub ? (int)explode('-', $last_sub->kode)[1] + 1 : 1));
        $result = $kategori->kode . '-' . $kode_kategori . '-' . $kode_sub;
        return $result;
    }

    public function store(StoreProdukRequest $request)
    {
        try {
            for ($i = 1; $i <= $request->jumlah; $i++) {
                $produk = Produk::create([
                    'kategori_id' => $request->kategori_id,
                    'sub_kategori_id' => $request->sub_kategori_id,
                    'jurusan_id' => $request->jurusan_id,
                    'nama' => $request->nama,
                    'kode' => $this->generate_kode($request, $i),
                    'merek' => $request->merek,
                    'kondisi' => $request->kondisi,
                    'ket_produk' => $request->ket_produk,
                    'ket_kondisi' => $request->ket_kondisi,
                ]);

                insertLog(Auth::user()->name . " Berhasil menambahkan produk " . $produk['nama']);
            }

            return redirect()->route('produk.index')->with('msg_success', 'Berhasil menambahkan produk');
        } catch (\Throwable $th) {
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
        return $produk;
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
        $kategoris = DB::table('kategoris')
                        ->where('sekolah_id', Auth::user()->sekolah_id)
                        ->where('jenis', 'sarana')
                        ->get();
        $subcategories = DB::table('subcategories')->select('subcategories.*')
                                                    ->join('kategoris', 'kategoris.id', 'subcategories.kategori_id')
                                                    ->where('kategoris.sekolah_id', Auth::user()->sekolah_id)
                                                    ->where('subcategories.kategori_id', $data->kategori_id)
                                                    ->get();
        $jurusans = DB::table('jurusans')
                            ->where('sekolah_id', Auth::user()->sekolah_id)
                            ->get();

        return view('produk.form', compact('data','kategoris', 'subcategories', 'jurusans'));
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
        // try {
            $produk->update([
                'kategori_id' => $request->kategori_id,
                'sub_kategori_id' => $request->sub_kategori_id,
                'jurusan_id' => $request->jurusan_id,
                'nama' => $request->nama,
                'merek' => $request->merek,
                'kondisi' => $request->kondisi,
                'ket_produk' => $request->ket_produk,
                'ket_kondisi' => $request->ket_kondisi,
            ]);

            insertLog(Auth::user()->name . " Berhasil mengubah produk " . $request->nama);
            return redirect()->route('produk.index')->with('msg_success', 'Berhasil mengubah produk');
        // } catch (\Throwable $th) {
        //     return redirect()->route('produk.index')->with('msg_error', 'Gagal Diubah');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if (!$produk) {
            return response()->json([
                'message' => 'The data wanna be delete Not Found!'
            ], 400);
        }

        $produk->delete();

        insertLog(Auth::user()->name . ' Berhasil menghapus produk ' . $produk->nama);

        return redirect()->route('produk.index')->with('msg_success', 'Berhasil menghapus produk');
    }
}
