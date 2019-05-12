<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    //
    protected $table = 'tb_siswa';
    protected $fillable = ['nis','namaSiswa','jenisKelamin','tanggalLahir','alamat','idKelas','namaOrtu', 'foto', 'noHp'];
    protected $primaryKey = 'nis';
    public $incrementing = false;
}
