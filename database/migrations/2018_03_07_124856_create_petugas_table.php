<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('spesialisasi');
            $table->text('alamat');
            $table->string('kota');
            $table->string('no_hp');
            $table->string('no_telp');
            $table->string('alamat_email');
            $table->date('tgl_mulai_praktek');
            $table->string('img');
            $table->integer('category_id');
            $table->time('senin1');
            $table->time('senin2');
            $table->time('selasa1');
            $table->time('selasa2');
            $table->time('rabu1');
            $table->time('rabu2');
            $table->time('kamis1');
            $table->time('kamis2');
            $table->time('jumat1');
            $table->time('jumat2');
            $table->time('sabtu1');
            $table->time('sabtu2');
            $table->time('minggu1');
            $table->time('minggu2');
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
        Schema::dropIfExists('petugas');
    }
}
