<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuangRequest;
use App\Models\Jurusan;
use App\Models\Kategori;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Auth, DB;

class RuangController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_ruang', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_ruang', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_ruang', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_ruang', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Ruang::paginate(10);
        return view('ruang.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::where('sekolah_id', Auth::user()->sekolah_id)->get();
        return view('ruang.form', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuangRequest $request)
    {
        $data = Ruang::create([
            'name' => $request->name,
            'kategori_id' => $request->kategori_id,
            'ruang_dipinjam' => $request->ruang_dipinjam ? true : false,
            'produk_dipinjam' => $request->produk_dipinjam ? true : false,
            'sekolah_id' => Auth::user()->sekolah_id
        ]);

        return response()->json([
            'data' => $data
        ], 200);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang = Ruang::find($id);
        return $ruang;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ruang::find($id);
        if ($data->sekolah_id != Auth::user()->sekolah_id) {
            abort(403);
        }
        $kategoris = Kategori::where('jenis', 'prasarana')->get();
        return view('ruang.form', compact('data', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RuangRequest $request, $id)
    {
        $data = Ruang::findOrFail($id);

        $data->update([
            'name' => $request->name,
            'kategori_id' => $request->kategori_id,
            'ruang_dipinjam' => $request->ruang_dipinjam ? true : false,
            'produk_dipinjam' => $request->produk_dipinjam ? true : false,
        ]);
        
        return response()->json([
            'data' => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Ruang::find($id);

        if(!$find){
            return response()->json([
                'massages' => "Updated data not found"
            ], 404);
        }

        $destroy = $find->delete();

        if(!$destroy){
            return response()->json([
                'massages' => "data failed to delete"
            ], 400);
        }

        return redirect('/'); //change this!
    }

    public function tambah_produk(Request $request){
        foreach ($request->produk_id as $key => $produk_id) {
            DB::table('produks')->where('id', $produk_id)->update([
                'ruang_id' => $request->ruang_id
            ]);
        }

        return response()->json([
            'message' => 'Berhasil ditambahkan'
        ], 200);
    }
}
