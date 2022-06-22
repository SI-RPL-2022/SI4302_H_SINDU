<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPengajuanRelawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengajuan_relawan', function (Blueprint $table) {
            $table->id('id_detail_pengajuan_relawan');
            $table->bigInteger('id_pengajuan_relawan')->unsigned();
            $table->foreign('id_pengajuan_relawan')->references('id_pengajuan_relawan')->on('pengajuan_relawan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_relawan'); 
            $table->string('email_relawan'); 
            $table->string('nik'); 
            $table->string('berkas_ktp'); 
            $table->string('berkas_cv'); 
            $table->string('status')->default('Diproses'); 
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
        Schema::dropIfExists('detail_pengajuan_relawan');
    }
}
