<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Produk;
use App\Models\Ruang;

class PublicController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function about(){
        return view('about');
    }

    public function faq(){
        $datas = DB::table('m_faqs')->get();
        return view('faq', compact('datas'));
    }

    public function produk($id){
        $data = Produk::where('id', decodeText($id)['identifier'])->first();
        $page = 'public';
        if (!$data) {return abort(403);}
        return view('produk.public', compact('data', 'page'));
    }

    public function ruang($id){
        $data = Ruang::where('id', decodeText($id)['identifier'])->first();
        $page = 'public';
        if (!$data) {return abort(403);}
        return view('ruang.public', compact('data', 'page'));
    }
}
