<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

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
        return $this->belongsTo(Subcategory::class, 'sub_kategori_id');
    }

    public function sekolah(){
        return $this->belongsTo(Sekolah::class);
    }

    public function tahunajaran(){
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function ruang(){
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }

    public function produks(){
        return $this->belongsToMany(Produk::class, 'peminjaman_produk', 'peminjaman_id', 'produk_id');
    }

    // Sub kategori paling banyak dipinjam
    public static function sub_terbanyak($sekolah_id, $bulan, $tahun){
        return DB::table('peminjamans')
                ->select('subcategories.nama as key', DB::raw('COUNT(peminjamans.id) as jml'))
                ->join('subcategories', 'subcategories.id', 'peminjamans.sub_kategori_id')
                ->where('peminjamans.sekolah_id', $sekolah_id)
                // ->where('peminjamans.status', 'diterima')
                ->when($bulan != 'all' && $bulan != 0, function ($q) use ($bulan){
                    $q->whereMonth('peminjamans.created_at', $bulan);
                })
                ->when($tahun != 'all' && $tahun != 0, function ($q) use ($tahun){
                    $q->whereMonth('peminjamans.created_at', $tahun);
                })
                ->orderBy('jml', 'desc')
                ->groupBy('subcategories.nama')
                ->limit(5)
                ->get();
    }

    public static function ruang_terbanyak($sekolah_id, $bulan, $tahun){
        return DB::table('peminjamans')
                    ->select('ruangs.name as key', DB::raw('COUNT(peminjamans.id) as jml'))
                    ->join('ruangs', 'ruangs.id', 'peminjamans.ruang_id')
                    ->where('peminjamans.sekolah_id', $sekolah_id)
                    // ->where('peminjamans.status', 'diterima')
                    ->when($bulan != 'all' && $bulan != 0, function ($q) use ($bulan){
                        $q->whereMonth('peminjamans.created_at', $bulan);
                    })
                    ->when($tahun != 'all' && $tahun != 0, function ($q) use ($tahun){
                        $q->whereMonth('peminjamans.created_at', $tahun);
                    })
                    ->orderBy('jml', 'desc')
                    ->groupBy('ruangs.name')
                    ->limit(5)
                    ->get();
    }

    public static function kelas_terbanyak($sekolah_id, $bulan, $tahun){
        return DB::table('peminjamans')
                    ->select('kelas.nama as key', DB::raw('COUNT(peminjamans.id) as jml'))
                    ->join('kelas', 'kelas.id', 'peminjamans.kelas_id')
                    ->where('peminjamans.sekolah_id', $sekolah_id)
                    // ->where('peminjamans.status', 'diterima')
                    ->when($bulan != 'all' && $bulan != 0, function ($q) use ($bulan){
                        $q->whereMonth('peminjamans.created_at', $bulan);
                    })
                    ->when($tahun != 'all' && $tahun != 0, function ($q) use ($tahun){
                        $q->whereMonth('peminjamans.created_at', $tahun);
                    })
                    ->orderBy('jml', 'desc')
                    ->groupBy('kelas.nama')
                    ->limit(5)
                    ->get();
    }

    public static function email_terbanyak($sekolah_id, $bulan, $tahun){
        return DB::table('peminjamans')
                    ->select('peminjamans.email as key', DB::raw('COUNT(peminjamans.id) as jml'))
                    ->where('peminjamans.sekolah_id', $sekolah_id)
                    // ->where('peminjamans.status', 'diterima')
                    ->when($bulan != 'all' && $bulan != 0, function ($q) use ($bulan){
                        $q->whereMonth('peminjamans.created_at', $bulan);
                    })
                    ->when($tahun != 'all' && $tahun != 0, function ($q) use ($tahun){
                        $q->whereMonth('peminjamans.created_at', $tahun);
                    })
                    ->orderBy('jml', 'desc')
                    ->groupBy('peminjamans.email')
                    ->limit(5)
                    ->get();
    }
}
