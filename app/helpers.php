<?php 

use App\Models\{
    Log,
    Jurusan,
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
