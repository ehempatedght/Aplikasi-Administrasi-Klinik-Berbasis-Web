<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('id_pasien');
            $table->integer('no_urut');
            $table->string('nama_pasien');
            $table->integer('id_kategoripasien');
            $table->string('golongan_darah');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->integer('id_kota');
            $table->integer('id_kec');
            $table->integer('id_kel');
            $table->string('kontak');
            $table->string('pekerjaan');
            $table->string('status_pernikahan');
            $table->string('no_kk');
            $table->string('namaIbuKandung');
            $table->string('namaAyahKandung');
            $table->date('TanggalLahir');
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
        Schema::dropIfExists('pasien');
    }
}
