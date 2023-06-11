<?php

namespace App\Http\Controllers;

use Auth, DB;
use App\Models\User;
use App\Models\Sekolah;
use App\Models\ref_agama;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request){
        $return = [];
        
        if (\Auth::user()->hasRole('super_admin')) {
            $countRole = Role::count() - 1;
            $countTahunAjaran = TahunAjaran::count();
            $return = [
                'countRole' => $countRole,
                'countTahunAjaran' => $countTahunAjaran
            ];
        }else {
            $produk_terbanyak = DB::table('peminjamans')
                                        ->select('subcategories.nama', DB::raw('COUNT(peminjamans.id) as total_peminjaman'))
                                        ->join('subcategories', 'subcategories.id', 'peminjamans.sub_kategori_id')
                                        ->where('peminjamans.sekolah_id', Auth::user()->sekolah_id)
                                        ->orderBy('total_peminjaman', 'desc')
                                        ->groupBy('subcategories.nama')
                                        ->limit(5)
                                        ->get();

            $ruang_terbanyak = DB::table('peminjamans')
                                        ->select('ruangs.name', DB::raw('COUNT(peminjamans.id) as total_peminjaman'))
                                        ->join('ruangs', 'ruangs.id', 'peminjamans.ruang_id')
                                        ->where('peminjamans.sekolah_id', Auth::user()->sekolah_id)
                                        ->orderBy('total_peminjaman', 'desc')
                                        ->groupBy('ruangs.name')
                                        ->limit(5)
                                        ->get();
            
            $kelas_terbanyak = DB::table('peminjamans')
                                        ->select('kelas.nama', DB::raw('COUNT(peminjamans.id) as total_peminjaman'))
                                        ->join('kelas', 'kelas.id', 'peminjamans.kelas_id')
                                        ->where('peminjamans.sekolah_id', Auth::user()->sekolah_id)
                                        ->orderBy('total_peminjaman', 'desc')
                                        ->groupBy('kelas.nama')
                                        ->limit(5)
                                        ->get();
            
            $email_terbanyak = DB::table('peminjamans')
                                        ->select('peminjamans.email', DB::raw('COUNT(peminjamans.id) as total_peminjaman'))
                                        ->where('peminjamans.sekolah_id', Auth::user()->sekolah_id)
                                        ->orderBy('total_peminjaman', 'desc')
                                        ->groupBy('peminjamans.email')
                                        ->limit(5)
                                        ->get();
            $return += [
                'total_kategori' => DB::table('kategoris')->count(),
                'total_produk' => DB::table('produks')->count(),
                'total_ruang' => DB::table('ruangs')->count(),
                'produk_terbanyak' => $produk_terbanyak,
                'ruang_terbanyak' => $ruang_terbanyak,
                'kelas_terbanyak' => $kelas_terbanyak,
                'email_terbanyak' => $email_terbanyak,
            ]; 
        }

        return view('dashboard', $return);
    }

    private function parseData($datas){
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
