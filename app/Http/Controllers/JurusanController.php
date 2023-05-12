<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_users', ['only' => ['index','show']]);
         $this->middleware('permission:add_users', ['only' => ['create','store']]);
         $this->middleware('permission:edit_users', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_users', ['only' => ['destroy']]);
    }

    public function index()
    {
        $datas = Jurusan::where('sekolah_id', Auth::user()->sekolah_id)->get();
        return view('jurusan.index', compact('datas'));
    }

    public function create()
    {
        return view('jurusan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama_jurusan" => "required",
            "nama_kaprog" => "required",
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'nama_kaprog'=> $request->nama_kaprog,
            'sekolah_id'=> Auth::user()->sekolah->id,
        ]);

        insertLog(Auth::user()->name . ' Berhasil menambahkan jurusan ' . $request->nama_jurusan);
        return redirect()->route('jurusan.index')->with('msg_success', 'Berhasil menambahkan jurusan');
    }

    public function show($id)
    {
        $jurusan = Jurusan::find($id);
        return $jurusan;
    }

    public function edit($id)
    {
        $data = Jurusan::find($id);
        return view('jurusan.form', compact('data'));
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
        insertLog(Auth::user()->name . ' Berhasil mengubah jurusan ' . $request->nama_jurusan);
        return redirect()->route('jurusan.index')->with('msg_success', 'Berhasil mengubah jurusan');
    }
    
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        return $jurusan->delete();
    }
}
