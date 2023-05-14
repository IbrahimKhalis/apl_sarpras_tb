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
        return view('produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = DB::table('kategoris')->where('sekolah_id', Auth::user()->sekolah_id)->get();
        $subcategories = DB::table('subcategories')->get();
        $jurusans = DB::table('jurusans')->get();
        return view('produk.form', compact('kategoris', 'subcategories', 'jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        try {
            for ($i = 0; $i < $request->jumlah; $i++) {
                $getCategorieName = DB::table('kategoris')->where('id', $request->kategori_id)->first()->kode;
                $countProdSub = count(DB::table('produks')->where('kategori_id', $request->kategori_id)->where('sub_kategori_id', $request->sub_kategori_id)->get()) + 1;
                $countProdKat = count(DB::table('produks')->where('kategori_id', $request->kategori_id)->get()) + 1;
                // dd("$getCategorieName".count($countProd) + 1);

                $produk = Produk::create([
                    'kategori_id' => $request->kategori_id,
                    'sub_kategori_id' => $request->sub_kategori_id,
                    'jurusan_id' => $request->jurusan_id,
                    'nama' => $request->nama,
                    'kode' => "$getCategorieName-$countProdKat-$countProdSub",
                    'merek' => $request->merek,
                    'kondisi' => $request->kondisi,
                    'ket_produk' => $request->ket_produk,
                    'ket_kondisi' => $request->ket_kondisi,
                ]);

                insertLog(Auth::user()->name . " Berhasil menambahkan produk " . $produk['nama']);
            }

            return redirect()->route('produk.index')->with('msg_success', 'Berhasil menambahkan produk');
        } catch (\Throwable $th) {
            dd($th);
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
    public function edit(Produk $produk)
    {
        return view('produk.form', compact('produk'));
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
            $getCategorieName = DB::table('kategoris')->where('id', $request->kategori_id)->first()->kode;
            $countProdSub = count(DB::table('produks')->where('kategori_id', $request->kategori_id)->where('sub_kategori_id', $request->sub_kategori_id)->get()) + 1;
            $countProdKat = count(DB::table('produks')->where('kategori_id', $request->kategori_id)->get()) + 1;
            // dd("$getCategorieName".count($countProd) + 1);

            $produk->update([
                'kategori_id' => $request->kategori_id,
                'sub_kategori_id' => $request->sub_kategori_id,
                'jurusan_id' => $request->jurusan_id,
                'nama' => $request->nama,
                'kode' => "$getCategorieName-$countProdKat-$countProdSub",
                'merek' => $request->merek,
                'kondisi' => $request->kondisi,
                'ket_produk' => $request->ket_produk,
                'ket_kondisi' => $request->ket_kondisi,
            ]);

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
