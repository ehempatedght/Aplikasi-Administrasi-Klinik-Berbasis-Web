<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataPemeriksaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemeriksaan', function (Blueprint $table) {
            $table->increments('id_pemeriksaan')->unsigned();
            $table->integer('id_kategori_pemeriksaan');
            $table->bigInteger('tarif');
            $table->bigInteger('diskon');
            $table->bigInteger('total');
            $table->bigInteger('jasa_dokter_utama');
            $table->bigInteger('jasa_asisten');
            $table->bigInteger('jasa_perawat1');
            $table->bigInteger('jasa_perawat2');
            $table->bigInteger('klinik');
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
        Schema::dropIfExists('data_pemeriksaan');
    }
}
