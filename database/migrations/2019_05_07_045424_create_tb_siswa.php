<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->string('nis', '25')->primary();
            $table->string('namaSiswa', '255');
            $table->enum('jenisKelamin', ['P', 'L'])->default('P');
            $table->date('tanggalLahir')->default('1991-01-01');
            $table->text('alamat');
            $table->string('idKelas','10')->index();
            $table->string('namaOrtu')->default('-');
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
        Schema::dropIfExists('tb_siswa');
    }
}
