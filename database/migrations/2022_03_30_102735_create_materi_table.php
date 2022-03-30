<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id('id_materi');
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_mate_pelajaran')->unsigned();
            $table->foreign('id_mate_pelajaran')->references('id_mate_pelajaran')->on('mata_pelajaran')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul_materi');
            $table->string('cover_materi');
            $table->string('slug');
            $table->longText('deskripsi_materi'); 
            $table->string('video_materi')->default('Tidak Ada');
            $table->string('status');            
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
        Schema::dropIfExists('materi');
    }
}
