<?php 

use App\Models\{
    Log,
    TahunAjaran,
};

if(! function_exists('insertLog')){
    function insertLog($txt)
    {
        Log::create([
            'user_id' => \Auth::user()->id,
            'ket'=> $txt
        ]);
    }
}

if(! function_exists('getTahunAjararan')){
    function getTahunAjararan()
    {
        return TahunAjaran::where('status', 'aktif')->first();
    }
}

if(! function_exists('validateSekolah')){
    function validateSekolah($id)
    {
        if ($id != Auth::user()->sekolah_id) {
            return abort(403);
        }
    }
}

