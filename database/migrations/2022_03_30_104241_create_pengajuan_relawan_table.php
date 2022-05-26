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
            $table->string('nama_lengkap'); 
            $table->string('nama_organisasi');
            $table->string('email'); 
            $table->string('no_hp', 13); 
            $table->date('startDate'); 
            $table->date('endDate'); 
            $table->string('deskripsi'); 
            $table->string('berkas'); 
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
        Schema::dropIfExists('pengajuan_relawan');
    }
}
