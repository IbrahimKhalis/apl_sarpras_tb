<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Kelas;
use App\Models\Sekolah;
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
        $datas = Kelas::where('sekolah_id', Auth::user()->sekolah_id)->paginate(10);
        return view('kelas.index', compact('datas'));
    }

    public function data($sekolah_id = null){
        if (!Auth::user()->hasRole('super_admin')) {
            $sekolah_id = Auth::user()->sekolah_id;
        }

        if (!$sekolah_id) {
            abort(403);
        }

        $data = Kelas::where('sekolah_id', $sekolah_id)->get();

        return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $action = '';
                if (Auth::user()->can('edit_kelas')){
                    $action .= '<a class="btn btn-warning btn-sm rounded" href="'. route('kelas.edit', $data->id) .'">Edit</a>';
                }
                if (Auth::user()->can('delete_kelas')) {
                    $action .= '<button type="submit" class="btn btn-sm btn-danger rounded ml-2" style="width: 4rem;"
                    onclick="deleteData("'. route('kelas.destroy', $data->id) .'")">Hapus</button>';
                }
                return $action;
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        return view('kelas.form');
    }

    public function store(StoreKelasRequest $request)
    {
        $kelas = Kelas::create([
            'sekolah_id' => Auth::user()->sekolah_id,
            'nama' => $request->nama,
        ]);
        insertLog(Auth::user()->name. " Berhasil menambahkan kelas ". $kelas['nama']);
        return redirect()->route('kelas.index')->with('msg_success', 'Berhasil menambahkan kelas');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        validateSekolah($data->sekolah_id);
        return view('kelas.form', compact('data'));
    }

    public function update(UpdateKelasRequest $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        validateSekolah($kelas->sekolah_id);
        $kelas->update(['nama' => $request->nama]);
        insertLog(Auth::user()->name. " Berhasil mengubah kelas ". $kelas['nama']);
        return redirect()->route('kelas.index')->with('msg_success', 'Berhasil mengubah kelas');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        validateSekolah($kelas->sekolah_id);
        $kelas->delete();
        insertLog(Auth::user()->name ." Berhasil menghapus kelas ". $kelas['nama']);
        return redirect()->route('kelas.index')->with('msg_success', 'Berhasil menghapus kelas');
    }
}
