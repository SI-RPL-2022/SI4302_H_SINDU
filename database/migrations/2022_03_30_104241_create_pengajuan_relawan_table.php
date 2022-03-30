<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanRelawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_relawan', function (Blueprint $table) {
            $table->id('id_pengajuan_relawan');
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_organisasi'); 
            $table->string('pengaju'); 
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
        Schema::dropIfExists('pengajuan_relawan');
    }
}
