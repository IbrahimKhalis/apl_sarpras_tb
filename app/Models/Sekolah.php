<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }

    public function provinsi(){
        return $this->belongsTo(ref_provinsi::class, 'ref_provinsi_id');
    }

    public function kabupaten(){
        return $this->belongsTo(ref_kabupaten::class, 'ref_kabupaten_id');
    }

    public function kecamatan(){
        return $this->belongsTo(ref_kecamatan::class, 'ref_kecamatan_id');
    }

    public function kelurahan(){
        return $this->belongsTo(ref_kelurahan::class, 'ref_kelurahan_id');
    }
}