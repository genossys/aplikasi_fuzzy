<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    //
    protected $table = 'tb_kelas';
    protected $fillable = ['idKelas', 'namaKelas'];
    protected $primaryKey = 'idKelas'; //mengubah primary key menjadi field ID Kelas
    public $incrementing = false; //nilai primary agar tidak menjadi 0
}
