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
            $table->string('nama');
            $table->string('email');
            // $table->foreignId('kategori_id')->constrained();
            // $table->foreignId('sub_kategori_id')->constrained('subcategories');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans');
            $table->string('status')->default('pengajuan');
            $table->date('tgl_peminjaman')->nullable();
            $table->date('tgl_pengembalian')->nullable();
            $table->boolean('email_penagihan')->nullable();
            $table->string('ttd')->nullable();
            $table->string('foto_peminjaman')->nullable();
            $table->string('foto_pengembalian')->nullable();
            $table->timestamps();
        });

        Schema::create('peminjaman_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('peminjamans');
            $table->foreignId('kelas_id')->constrained('kelas');
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
