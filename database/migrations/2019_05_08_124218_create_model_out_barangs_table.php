<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelOutBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string ('no_sbk');
            $table->integer ('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('daftar_barang');
            $table->integer ('quantity');
            $table->integer ('id_sales');
            $table->foreign('id_sales')->references('no_identitas')->on('sales');
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
        Schema::dropIfExists('model_out_barangs');
    }
}
