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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained();
            $table->foreignId('sub_kategori_id')->constrained('subcategories');
            $table->foreignId('jurusan_id')->constrained('jurusans')->nullable();
            $table->string('nama');
            $table->string('kode');
            $table->string('merek');
            $table->enum('kondisi', ['B', 'KB', "RB"]);
            $table->text('ket_produk');
            $table->text('ket_kondisi');
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
        Schema::dropIfExists('produks');
    }
};
