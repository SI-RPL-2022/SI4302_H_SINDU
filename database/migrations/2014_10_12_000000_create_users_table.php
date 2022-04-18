<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('google_id')->nullable();
            $table->string('level')->default('relawan');        
            $table->string('password');
            $table->string('jenis_kelamin')->nullable();
            $table->string('nik')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 13)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('riwayat_pendidikan')->nullable();
            $table->string('foto_profile')->default('relawan.jpg');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
