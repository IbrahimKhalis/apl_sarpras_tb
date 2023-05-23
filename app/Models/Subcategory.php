<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function produk(){
        return $this->hasMany(Produk::class, 'sub_kategori_id');
    }
}
