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
        Schema::table('ruangs', function (Blueprint $table) {
            $table->boolean('ruang_dipinjam');
            $table->boolean('produk_dipinjam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ruangs', function (Blueprint $table) {
            $table->dropColumn('ruang_dipinjam');
            $table->dropColumn('produk_dipinjam');
        });
    }
};
