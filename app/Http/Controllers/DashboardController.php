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
            $bulan = request('bulan') ?? date('m');

            $sub_terbanyak = DB::table('peminjamans')
                                        ->select('subcategories.nama as key', DB::raw('COUNT(peminjamans.id) as jml'))
                                        ->join('subcategories', 'subcategories.id', 'peminjamans.sub_kategori_id')
                                        ->where('peminjamans.sekolah_id', Auth::user()->sekolah_id)
                                        // ->where('peminjamans.status', 'diterima')
                                        ->when($bulan != 'all', function ($q) use ($bulan){
                                            $q->whereMonth('peminjamans.created_at', $bulan);
                                        })
                                        ->orderBy('jml', 'desc')
                                        ->groupBy('subcategories.nama')
                                        ->limit(5)
                                        ->get();

            $ruang_terbanyak = DB::table('peminjamans')
                                        ->select('ruangs.name as key', DB::raw('COUNT(peminjamans.id) as jml'))
                                        ->join('ruangs', 'ruangs.id', 'peminjamans.ruang_id')
                                        ->where('peminjamans.sekolah_id', Auth::user()->sekolah_id)
                                        // ->where('peminjamans.status', 'diterima')
                                        ->when($bulan != 'all', function ($q) use ($bulan){
                                            $q->whereMonth('peminjamans.created_at', $bulan);
                                        })
                                        ->orderBy('jml', 'desc')
                                        ->groupBy('ruangs.name')
                                        ->limit(5)
                                        ->get();
            
            $kelas_terbanyak = DB::table('peminjamans')
                                        ->select('kelas.nama as key', DB::raw('COUNT(peminjamans.id) as jml'))
                                        ->join('kelas', 'kelas.id', 'peminjamans.kelas_id')
                                        ->where('peminjamans.sekolah_id', Auth::user()->sekolah_id)
                                        // ->where('peminjamans.status', 'diterima')
                                        ->when($bulan != 'all', function ($q) use ($bulan){
                                            $q->whereMonth('peminjamans.created_at', $bulan);
                                        })
                                        ->orderBy('jml', 'desc')
                                        ->groupBy('kelas.nama')
                                        ->limit(5)
                                        ->get();
            
            $email_terbanyak = DB::table('peminjamans')
                                        ->select('peminjamans.email as key', DB::raw('COUNT(peminjamans.id) as jml'))
                                        ->where('peminjamans.sekolah_id', Auth::user()->sekolah_id)
                                        // ->where('peminjamans.status', 'diterima')
                                        ->when($bulan != 'all', function ($q) use ($bulan){
                                            $q->whereMonth('peminjamans.created_at', $bulan);
                                        })
                                        ->orderBy('jml', 'desc')
                                        ->groupBy('peminjamans.email')
                                        ->limit(5)
                                        ->get();
            $return += [
                'total_kategori' => DB::table('kategoris')->count(),
                'total_produk' => DB::table('produks')->count(),
                'total_ruang' => DB::table('ruangs')->count(),
                'sub_terbanyak' => $this->parseData($sub_terbanyak),
                'ruang_terbanyak' => $this->parseData($ruang_terbanyak),
                'kelas_terbanyak' => $this->parseData($kelas_terbanyak),
                'email_terbanyak' => $this->parseData($email_terbanyak),
            ]; 
        }

        return view('dashboard', $return);
    }

    private function parseDataPie($datas) {
        $result = [];
        foreach ($datas as $key => $data) {
            $result[] = [
                'name' => $data->key,
                'y' => $data->jml
            ];
        }
        return $result;
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
