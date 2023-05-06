<?php

namespace App\Http\Controllers;

use DB, Auth;
use App\Models\Kelas;
use App\Models\User;
use App\Models\TahunAjaran;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class KelasController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_kelas', ['only' => ['index','show']]);
         $this->middleware('permission:add_kelas', ['only' => ['create','store']]);
         $this->middleware('permission:edit_kelas', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_kelas', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        return view('kelas.index');
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(StoreKelasRequest $request)
    {   
        Kelas::create([
            'nama' => $request->nama,
            'sekolah_id' => \Auth::user()->sekolah_id
        ]);

        return TahunAjaran::redirectWithTahunAjaran('kelas.index', $request, 'Kelas Berhasil Ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        abort(404);
    }

    public function edit(Kelas $kelas, $id)
    {
        $kelas = Kelas::findOrFail($id);
        if ($kelas->sekolah_id == \Auth::user()->sekolah->id) {
            return view('kelas.update', [
                'data' => $kelas
            ]);
        }

        abort(403);
    }

    public function update(UpdateKelasRequest $request, Kelas $kelas, $id)
    {
        $kelas = Kelas::findOrFail($id);
        if ($kelas->sekolah_id == \Auth::user()->sekolah->id) {
            $kelas->update([
                'nama' => $request->nama
            ]);
    
            return TahunAjaran::redirectWithTahunAjaran('kelas.index', $request, 'Kelas Berhasil Diupdate');
        }

        abort(403);
    }

    public function destroy(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        if ($kelas->sekolah_id == \Auth::user()->sekolah->id) {
            dd('perlu diperbaiki');
    
            $kelas->delete();
    
            return TahunAjaran::redirectWithTahunAjaran('kelas.index', $request, 'Kelas Berhasil Dihapus');
        }

        abort(403);
    }
}
