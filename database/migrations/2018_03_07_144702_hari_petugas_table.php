<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HariPetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_petugas', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('day_id')->unsigned()->index();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->integer('petugas_id')->unsigned()->index();
            $table->foreign('petugas_id')->references('id')->on('petugas')->onDelete('cascade');
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
        //
    }
}
