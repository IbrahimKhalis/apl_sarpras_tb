<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained();
            $table->foreignId('sub_kategori_id')->nullable()->constrained('subcategories');
            $table->foreignId('sekolah_id')->constrained('sekolahs');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans');
            $table->foreignId('ruang_id')->nullable()->constrained('ruangs');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('jenis');
            $table->string('email');
            $table->timestamp('tgl_peminjaman')->nullable();
            $table->timestamp('tgl_pengembalian')->nullable();
            $table->boolean('email_penagihan')->nullable();
            $table->string('ttd')->nullable();
            $table->string('jml_peminjaman')->nullable();
            $table->string('foto_peminjaman')->nullable();
            $table->string('foto_pengembalian')->nullable();
            $table->string('status')->default('pengajuan');
            $table->boolean('status_pengembalian')->default(0);
            $table->string('ket')->nullable();
            $table->timestamps();
        });

        Schema::create('peminjaman_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('peminjamans');
            $table->foreignId('produk_id')->constrained('produks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
        Schema::dropIfExists('peminjaman_produk');
    }
};
