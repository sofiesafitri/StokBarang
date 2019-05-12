<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelInBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_barang', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string ('no_sbm');
            $table->integer ('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('daftar_barang');
            $table->integer ('quantity');
            $table->integer ('id_pegawai');
            $table->foreign('id_pegawai')->references('id')->on('pegawai');
            $table->string ('keterangan');
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
        Schema::dropIfExists('in_barang');
    }
}
