<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Sekolah;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        return Kategori::all();
    }

    public function add(){
        $sekolah = Sekolah::all();
        return view('kategori.create', compact('sekolah')); //change this
    }

    public function create(Request $request){
        
        $create = Kategori::create([
            'nama' => $request->nama,
            'sekolah_id' => $request->sekolah_id,
            'kode' => $request->kode,
        ]);

        $arrayOfSub = array_values(array_filter(explode(PHP_EOL, $request->subCategory)));

        foreach($arrayOfSub as $item){
            Subcategory::create([
                'kategori_id' => $create->id,
                'nama' => $item,
            ]);
        }

        if(!$create){
            return response()->json([
                'massages' => "Create Failed!"
            ], 400);
        }

        return redirect()->route('sementara.kategori.index'); //change this

    }

    public function show($id){
        $kategori = Kategori::find($id);
        
        return $kategori;//Change This
    }

    public function edit($id){
        $kategori = Kategori::find($id);
        $sekolah = Sekolah::all();
        $subCategory = $kategori->subcategory;

        return view('kategori.edit', compact(
            'kategori',
            'sekolah',
            'subCategory'
        ));
    }

    public function update(Request $request, $id){

        $kategori = Kategori::find($id);

        if(!$kategori){
            return response()->json([
                'massages' => "The data that wanna be updated Not Found!"
            ], 404);
        }

        $update = $kategori->update([
            'nama' => $request->nama,
            'sekolah_id' => $request->sekolah_id,
            'kode' => $request->kode,
        ]);

        if(!$update){
            return response()->json([
                'massages' => "Failed to Update!"
            ], 400);
        }

        return redirect()->route('sementara.kategori.index'); //change this
    }

    public function destroy($id){
        $kategori = Kategori::find($id);

        if(!$kategori){
            return response()->json([
                'massages' => "The data that wanna be deleted Not Found!"
            ], 404);
        }

        $delete = $kategori->delete();

        if(!$delete){
            return response()->json([
                'massages' => "Failed to Delete!"
            ], 400);
        }

        return redirect('/'); //Change this
    }


}
