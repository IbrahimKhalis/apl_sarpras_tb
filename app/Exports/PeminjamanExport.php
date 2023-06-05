<?php

namespace App\Exports;

use App\Models\Kelas;
use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;

class PeminjamanExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Peminjaman::with(['kelas', 'produk'])->get();
    // }
    use Exportable;

    public function view(): View
    {
        $datas = Peminjaman::with(['kelas', 'produks', 'kategori', 'subcategorie', 'sekolah', 'tahunajaran', 'ruang'])->get();
        return view("exports.peminjamanexport", compact('datas'));
    }
}
