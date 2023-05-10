<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    public function index()
    {
        return Jurusan::all();
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "nama_jurusan" => "required",
            "nama_kaprog" => "required",
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'nama_kaprog'=> $request->nama_kaprog,
            'sekolah_id'=> Auth::user()->sekolah->id,
        ]);

        return $request->all();
    }

    public function show($id)
    {
        $jurusan = Jurusan::find($id);

        return $jurusan;
    }

    public function edit($id)
    {
        $jurusan = Jurusan::find($id);

        return $jurusan;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'nama_kaprog' => 'required',
        ]);

        $jurusan = Jurusan::find($id);

        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
            'nama_kaprog'=> $request->nama_kaprog,
        ]);
        
        return $jurusan;
    }
    
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);

        return $jurusan->delete();
    }
}
