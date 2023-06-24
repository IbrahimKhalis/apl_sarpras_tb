<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function check_user($id, $role){
        if ($role !== 'kelas') {
            $data = User::findOrFail($id);
            if (!$data->hasRole($role)) {
                return abort(403);
            }
    
            if ($data->sekolah->id != \Auth::user()->sekolah->id) {
                return abort(403);
            }
        }
    }

    protected function getDate(){
        $now = Carbon::now();
        $month = $now->year . '-' . (int) (request('bulan') ?? $now->month);
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();

        $date = [];
        while ($start->lte($end)) {
            $date[] = Carbon::parse($start->copy())->format('Y-m-d');
            $start->addDay();
        }

        return $date;
    }

    public function parseDataToArray($datas){
        $return = [];

        foreach ($datas as $key => $data) {
            array_push($return, $data->id);
        }

        return $return;
    }

    public function uploadImage($img, $name_folder){
        $folderPath = $name_folder . "/";
        $image_parts = explode(";base64,", $img);
        foreach ($image_parts as $key => $image){
            $image_base64 = base64_decode($image);
        }
        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);
        return $fileName;
    }

    public function uploadTtd(){
        $folderPath = "ttd/";
        $img_parts =  explode(";base64,", $signed);
        $img_type_aux = explode("image/", $img_parts[0]);
        $img_type = $img_type_aux[1];
        $img_base64 = base64_decode($img_parts[1]);
        $namaTandaTangan =   uniqid() . '.'.$img_type;
        $file = $folderPath . $namaTandaTangan;
        file_put_contents($file, $img_base64);
        return $namaTandaTangan;
    }

    public function parseData($datas){
        $result = [
            'key' => [],
            'data' => []
        ];
        foreach ($datas as $key => $data) {
            array_push($result['key'], ucfirst($data->key));
            array_push($result['data'], $data->jml);
        }
        return $result;
    }
}
