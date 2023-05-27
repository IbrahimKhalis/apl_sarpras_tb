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

    public function produks(){
        return $this->belongsToMany(Produk::class, 'peminjaman_produk', 'peminjaman_id', 'produk_id');
    }
}
