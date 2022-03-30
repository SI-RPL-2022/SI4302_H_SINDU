<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestVolunteerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_volunteer', function (Blueprint $table) {
            $table->id('id_req_volunteer');
            $table->string('nama_lengkap'); 
            $table->string('email'); 
            $table->string('no_hp', 13); 
            $table->string('deskripsi'); 
            $table->string('berkas'); 
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
        Schema::dropIfExists('request_volunteer');
    }
}
