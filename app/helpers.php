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

if(! function_exists('getTahunAjaran')){
    function getTahunAjaran()
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

if (! function_exists('encodeText')) {
    function encodeText($text)
    {
        $key = [
            'identifier' => $text,
        ];
        $jsonParams = json_encode($key);
        $key['hash'] = hash('sha256', $jsonParams);
        $encryptedParams = Crypt::encrypt($jsonParams);
        return urlencode($encryptedParams);
    }
}

if (! function_exists('decodeText')) {
    function decodeText($hash)
    {
        try {
            $decodedValue = urldecode($hash);
            $decryptedValue = Crypt::decrypt($decodedValue);
            $decodedParams = json_decode($decryptedValue, true);
            return $decodedParams;
        } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
            return false;
        }
    }
}

