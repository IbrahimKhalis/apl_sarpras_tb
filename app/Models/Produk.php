<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function subcategorie()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function fotos(){
        return $this->hasMany(Foto::class);
    }

    public function ruang(){
        return $this->belongsTo(Ruang::class);
    }
    // public function jurusan()
    // {
    //     return $this->belongsTo(Jurusan::class);
    // }
}
