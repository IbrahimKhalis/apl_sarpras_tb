<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Sekolah;
use App\Models\Subcategory;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Http\Request;
use DB, Auth;

class KategoriController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:view_kategori', ['only' => ['index','show']]);
         $this->middleware('permission:add_kategori', ['only' => ['create','store']]);
         $this->middleware('permission:edit_kategori', ['only' => ['edit','update']]);
         $this->middleware('permission:delete_kategori', ['only' => ['destroy']]);
    }

    public function index(){
        $datas = Kategori::all();
        return view('kategori.index', compact('datas'));
    }

    public function create(){
        return view('kategori.form');
    }

    public function store(StoreKategoriRequest $request){
        DB::beginTransaction();
        try {
            $kategori = Kategori::create([
                'nama' => $request->nama,
                'sekolah_id' => Auth::user()->sekolah_id,
                'kode' => $request->kode,
                'jenis' => $request->jenis,
            ]);

            insertLog(Auth::user()->name . ' Berhasil menambahkan kategori ' . $request->nama);
            if ($request->sub) {
                foreach($request->sub as $sub){
                    Subcategory::create([
                        'kategori_id' => $kategori->id,
                        'nama' => $sub,
                    ]);
                    insertLog(Auth::user()->name . ' Berhasil menambahkan sub kategori ' . $sub);
                }
            }
            DB::commit();
            return redirect()->route('kategori.index')->with('msg_success', 'Berhasil menambahkan kategori');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('kategori.create')->with('msg_error', "Gagal Ditambahkan"); 
        }
    }

    public function show($id){
        $kategori = Kategori::find($id);
        return $kategori;
    }

    public function edit($id){
        $data = Kategori::find($id);
        return view('kategori.form', compact('data'));
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try {
            $kategori = Kategori::find($id);
            $kategori->update([
                'nama' => $request->nama,
                'kode' => $request->kode,
            ]);

            insertLog(Auth::user()->name . ' Berhasil mengubah kategori ' . $request->nama);

            if ($request->sub) {
                foreach($request->sub as $sub){
                    Subcategory::create([
                        'kategori_id' => $kategori->id,
                        'nama' => $sub,
                    ]);
                    insertLog(Auth::user()->name . ' Berhasil menambahkan sub kategori ' . $sub);
                }
            }
            
            DB::commit();
            return redirect()->route('kategori.index')->with('msg_success', 'Berhasil mengubah kategori');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('kategori.create')->with('msg_error', "Gagal Ditambahkan"); 
        }
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

        return redirect('/');
    }

    public function updateSub(Request $request, $id){
        $data = Subcategory::findOrFail($id);
        $data->update([
            'nama' => $request->nama
        ]);
        insertLog(Auth::user()->name . ' Berhasil mengubah sub kategori');
        return response()->json([
            'data' => $data,
        ], 200);
    }

    public function deleteSub(Request $request, $id){
        $data = Subcategory::findOrFail($id)->delete();
        insertLog(Auth::user()->name . ' Berhasil menghapus sub kategori');
        return response()->json([
            'message' => 'Berhasil dihapus'
        ], 200);
    }
}
