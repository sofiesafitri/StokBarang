<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai',function (Blueprint $table){
            $table->string ('no');
            $table->string ('nama');
            $table->string ('jenis_kelamin');
            $table->string ('alamat');
            $table->string ('no_telp');
            $table->string ('email', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_pegawai');
    }
}
