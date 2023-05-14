<?php

namespace App\Http\Controllers;

use DB, Auth;
use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:view_produk', ['only' => ['index','show']]);
    //      $this->middleware('permission:add_produk', ['only' => ['create','store']]);
    //      $this->middleware('permission:edit_produk', ['only' => ['edit','update']]);
    //      $this->middleware('permission:delete_produk', ['only' => ['destroy']]);
    // }

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
        return view('produk.form', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        $produk = Produk::create([
            'kategori_id' => $request->katgori_id,
            'sub_kategori_id' => $request->sub_katgori_id,
            'jurusan_id' => $request->jurusan_id,
            'nama' => $request->nama,
            'kode' => $request->kode,
            'merek' => $request->merek,
            'kondisi' => $request->kondisi,
            'ket_produk' => $request->ket_produk,
            'ket_kondisi' => $request->ket_kondisi,
        ]); 

        return redirect('/produk')->with('success', 'Produk berhasil ddi buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
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
        $produk->update([
            'kategori_id' => $request->katgori_id,
            'sub_kategori_id' => $request->sub_katgori_id,
            'jurusan_id' => $request->jurusan_id,
            'nama' => $request->nama,
            'kode' => $request->kode,
            'merek' => $request->merek,
            'kondisi' => $request->kondisi,
            'ket_produk' => $request->ket_produk,
            'ket_kondisi' => $request->ket_kondisi,
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return back();
    }
}
