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
        return view('/admin/master/tambahsiswa', ['tambah' => 'tambah']);
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
            ->select('nis', 'namaSiswa', 'jenisKelamin', 'tanggalLahir', 'alamat', 'idKelas', 'namaOrtu', 'foto', 'noHp')
            ->orderBy('nis', 'ASC')
            ->get();
        return DataTables::of($datasiswa)
            ->addColumn('action', function () {
                return '<a class="btn-sm btn-warning" href="#" id="btn-edit"> <i class="fa fa-edit"></i> <a/> 
                        <a class="btn-sm btn-danger" href="#" id="btn-delete" style="margin-left: 5px"><i class="fa fa-trash"></i></a>
                        <a class="btn-sm btn-danger details-control" href="#" id="btn-detail"><i class="fa fa-folder-open"></i></a>';
            })
            ->editColumn('jenisKelamin', function ($datasiswa) {
                if ($datasiswa->jenisKelamin == 'L') {
                    return 'Laki-Laki';
                } else {
                    return 'Perempuan';
                }
            })->editColumn('foto', function ($datasiswa){
                if ($datasiswa->foto == ''){
                    return 'default.png';
                }else{
                    return $datasiswa->foto;
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
            'image' => 'File Bukan Gambar'
        ];

        $rules = [
            'txtNis' => 'required|max:10',
            'txtNamaSiswa' => 'required|max:255',
            'cmbjenisKelamin' => 'required|',
            'txtTanggalLahir' => 'required|',
            'cmbKelas' => 'required|',
            'txtNoHp' => 'required|',
            'txtFoto' => 'required|image|mimes:jpeg,png,jpg|max:100'

        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function insert(Request $r)
    {

        if ($this->isValid($r)->fails()){
            return response()->json([
                'valid' => false,
                'errors' => $this->isValid($r)->errors()->all()
            ]);
        }else{
            if ($r->hasFile('txtFoto')){
                    $nis = $r->txtNis;
                    $upload = $r->file('txtFoto');
                    $namafoto = $nis.'.'.$upload->getClientOriginalExtension();
                    $r->txtFoto->move(public_path('images/fotosiswa'), $namafoto);
                    $siswa = new siswa;
                    $siswa->nis = $r->txtNis;
                    $siswa->namaSiswa = $r->txtNamaSiswa;
                    $siswa->jenisKelamin = $r->cmbjenisKelamin;
                    $siswa->tanggalLahir = $r->txtTanggalLahir;
                    $siswa->alamat = $r->txtAlamat;
                    $siswa->idKelas = $r->cmbKelas;
                    $siswa->namaOrtu = $r->txtOrtuSiswa;
                    $siswa->foto = $namafoto;
                    $siswa->noHp = $r->txtNoHp;
                    $siswa->save();
                return response()
                    ->json([
                        'valid' => true,
                        'sukses' => $siswa,
                        'url' => 'kelas/dataKelas'
                    ]);
                }

        }
    }


}
