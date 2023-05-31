<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sekolah;
use App\Models\Kelas;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sekolah = Sekolah::create([
            'nama' => 'SMK Taruna Bhakti',
            'npsn' => '20229232',
            'kode' => '121',
            'jenjang' => 'smk',
            'alamat' => 'ads',
            'jam_masuk' => '07:36:16',
            'jam_pulang' => '23:31:18',
        ]);

        Kelas::create([
            'nama' => 'XII RPL 2',
            'sekolah_id' => $sekolah->id
        ]);
    }
}
