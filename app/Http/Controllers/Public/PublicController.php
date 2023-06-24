<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
}
