<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB, Auth;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sekolah(){
        return $this->belongsTo(Sekolah::class);
    }
}
