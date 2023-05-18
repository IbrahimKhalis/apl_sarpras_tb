<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view_kelas', ['only' => ['index', 'show']]);
        $this->middleware('permission:add_kelas', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_kelas', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_kelas', ['only' => ['destroy']]);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreKelasRequest $request)
    {
        try {
            $kelas = Kelas::create([
                'sekolah_id' => $request->sekolah_id,
                'nama' => $request->nama,
            ]);
            insertLog(Auth::user()->name. " Berhasil menambahkan kelas ". $kelas['nama']);
            return redirect()->route('kelas.index')->with('msg_success', 'Berhasil menambahkan kelas');
        } catch (\Throwable $th) {
            return redirect()->route('kelas.index')->with('msg_error', 'Gagal menambahkan kelas');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateKelasRequest $request, $id)
    {
        try {
            $kelas = Kelas::with(['sekolah'])->find($id);
            $kelas->update([
                'sekolah_id' => $request->sekolah_id,
                'nama' => $request->nama,
            ]);
            insertLog(Auth::user()->name. " Berhasil mengubah kelas ". $kelas['nama']);
            return redirect()->route('kelas.index')->with('msg_success', 'Berhasil mengubah kelas');
        } catch (\Throwable $th) {
            return redirect()->route('kelas.index')->with('msg_error', 'Gagal mengubah kelas');
        }
    }

    public function destroy($id)
    {
        $kelas = Kelas::with(['sekolah'])->find($id);
        if(!$kelas) return abort(403, 'Kelas yang ingin di hapus tidak ditemukan!');

        $kelas->delete();
        insertLog(Auth::user()->name ." Berhasil menghapus kelas ". $kelas['nama']);
        
        return redirect()->route('kelas.index')->with('msg_success', 'Berhasil menghapus kelas');
    }
}
