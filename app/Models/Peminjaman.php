<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    protected $guarded = ['id'];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function subcategorie(){
        return $this->belongsTo(Subcategory::class);
    }

    public function sekolah(){
        return $this->belongsTo(Sekolah::class);
    }

    public function tahunajaran(){
        return $this->belongsTo(TahunAjaran::class);
    }

    public function ruang(){
        return $this->belongsTo(Ruang::class);
    }

    public function produks(){
        return $this->belongsToMany(Produk::class, 'peminjaman_produk', 'peminjaman_id', 'produk_id');
    }
}
