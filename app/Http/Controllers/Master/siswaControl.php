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
    public function index()
    {
        return view('admin.master.datasiswa');
    }

    public function siswaBaru()
    {
        return view('/admin/master/tambahsiswa');
    }

    public function getDataKelas()
    {
        $datakelas = kelas::query()
            ->select('idKelas')
            ->orderBy('idKelas', 'ASC')
            ->get();
        return response()->json($datakelas);
    }

    public function getData()
    {
        $datasiswa = siswa::query()
            ->select('nis', 'namaSiswa', 'jenisKelamin', 'tanggalLahir', 'alamat', 'idKelas', 'namaOrtu')
            ->orderBy('nis', 'ASC')
            ->get();
        return DataTables::of($datasiswa)
            ->addColumn('action', function () {
                return '<a class="btn-sm btn-warning" href="#" id="btn-edit"> <i class="fa fa-edit"></i> <a/> 
                        <a class="btn-sm btn-danger" href="#" id="btn-delete" style="margin-left: 5px"><i class="fa fa-trash"></i></a>
                        <a class="btn-sm btn-danger details-control"><i class="fa fa-folder-open"></i></a>';
            })
            ->editColumn('jenisKelamin', function ($datasiswa) {
                if ($datasiswa->jenisKelamin == 'L') {
                    return 'Laki-Laki';
                } else {
                    return 'Perempuan';
                }
            })
            ->addIndexColumn()
            ->make(true);
    }

    private function isValid(Request $r)
    {
        $messages = [
            'required' => 'Field :attribute Tidak Boleh Kosong',
            'max' => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'nis' => 'required|max:10',
            'namaSiswa' => 'required|max:255',
            'txtFoto' => 'images|mimes:jpeg,png,jpg|max:100'

        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function insert(Request $r)
    {

        if ($r->hasFile('txtFoto')){
                $upload = $r->file('txtFoto');
                $name = $upload->getClientOriginalName();
                $r->txtFoto->move(public_path('images/make'), $name);
            }

        return response()->json([
            'ar' => $name
        ]);
    }


}
