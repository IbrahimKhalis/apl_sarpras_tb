<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        return Kategori::all();
    }

    public function add(){
        return view('stuff'); //change this
    }

    public function create(Request $request){
        
        $create = Kategori::create([
            'nama' => $request->nama,
            'sekolah_id' => $request->sekolah_id,
            'kode' => $request->kode,
        ]);

        if(!$create){
            return response()->json([
                'massages' => "Create Failed!"
            ], 400);
        }

        return redirect('/'); //change this

    }

    public function show($id){
        $kategori = Kategori::find($id);
        
        return view('stuff', [
            'kategori' => $kategori
        ]); //Change This
    }

    public function edit(){
        return view('stuff');//change this
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

        return redirect('/'); //change this
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
