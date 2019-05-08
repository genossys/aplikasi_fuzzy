<?php

namespace App\Http\Controllers\Master;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\siswa;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Master\kelas;

class siswaControl extends Controller
{
    //
    public function index(){
        return view('admin.master.datasiswa');
    }

    public function getDataKelas(){
        $datakelas = kelas::query()
            ->select('idKelas')
            ->orderBy('idKelas', 'ASC')
            ->get();
        return response()->json($datakelas);
    }

    public function getData(){
        $datasiswa = siswa::query()
            ->select('nis','namaSiswa','jenisKelamin','tanggalLahir','alamat','idKelas','namaOrtu')
            ->orderBy('nis','ASC')
            ->get();
        return DataTables::of($datasiswa)
            ->addColumn('action', function (){
                return '<a class="btn-sm btn-warning" href="#"  onclick="test()"> Edit <a/> &nbsp; <a class="btn-sm btn-danger" href="#">Delete</a>';
            })
            ->editColumn('jenisKelamin', function ($datasiswa){
                if ($datasiswa->jenisKelamin == 'L'){
                    return 'Laki-Laki';
                } else{
                    return 'Perempuan';
                }
            })
            ->addIndexColumn()
            ->make(true);
    }

    private function isValid(Request $r){
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'nis'   => 'required|max:10',
            'namaSiswa' => 'required|max:255'
        ];

        return Validator::make($r->all(), $rules, $messages);
    }
    public function insert(Request $r){

        if ($this->isValid($r)->fails()){
            return response()->json([
                'valid' => false,
                'errors' => $this->isValid($r)->errors()->all()
            ]);
        }else {

            $siswa = new siswa;
            $siswa->nis = $r->input('nis');
            $siswa->namaSiswa = $r->input('namaSiswa');
            $siswa->jenisKelamin = $r->input('jenisKelamin');
            $siswa->tanggalLahir = $r->input('tanggalLahir');
            $siswa->alamat = $r->input('alamat');
            $siswa->idKelas = $r->input('idKelas');
            $siswa->namaOrtu = $r->input('namaOrtu');
            $siswa->save();
            return response()
                ->json([
                    'valid' => true,
                    'sukses' => $siswa
                ]);
        }
    }


}
