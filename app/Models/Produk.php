<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function subcategorie()
    {
        return $this->belongsTo(Subcategory::class, 'sub_kategori_id');
    }

    public function fotos(){
        return $this->hasMany(Foto::class);
    }

    public function ruang(){
        return $this->belongsTo(Ruang::class);
    }

    public function peminjaman(){
        return $this->belongsToMany(Peminjaman::class, 'peminjaman_produk', 'produk_id', 'peminjaman_id');
    }
}
