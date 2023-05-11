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
<<<<<<< HEAD
        return Jurusan::all();
        
=======
        return view('jurusan.form');
>>>>>>> 0bee5ffe0bcc32f08d888a54489162aff6f26a04
    }

    public function create()
    {
        return view('jurusan.form');
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

        return back();
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
