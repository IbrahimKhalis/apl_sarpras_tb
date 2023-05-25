<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Sekolah;

class PeminjamanController extends Controller
{
    public function create(){
        $sekolahs = DB::table('sekolahs')->select('id', 'nama')->get();
        return view('peminjaman_public.create', compact('sekolahs'));
    }

    public function cek_kode(Request $request){
        $request->validate([
            'sekolah_id' => 'required',
            'kode' => 'required'
        ]);

        $sekolah = Sekolah::findOrFail($request->sekolah_id);

    }
}
