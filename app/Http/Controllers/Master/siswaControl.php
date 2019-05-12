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
                        <a class="btn-sm btn-danger" href="#" id="btn-delete" style="margin-left: 5px"><i class="fa fa-trash"></i></a>';
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
            'foto' => 'images|mimes:jpeg,png,jpg|max:2048'

        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function insert(Request $r)
    {

//        request()->validate([
//           'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
//        ]);

//        $imagename = time().'.'.$r->image->getClientOriginalExtension();
//            $imagename = time().'-'.$r->txtFoto->getClientOriginalName();
//        $r->image->move(public_path('images'), $imagename);

        return response()->json([
//           'hasil' => $imagename,
            'ar' => $r->txtNis
        ]);
//        if ($this->isValid($r)->fails()){
//            return response()->json([
//                'valid' => false,
//                'errors' => $this->isValid($r)->errors()->all()
//            ]);
//        }else {
//
//            if ($r->hasFile('image')){
//                $upload = $r->file('txtFotoSiswa');
//                $name = $upload->getClientOriginalName().'.'.$upload->getClientOriginalExtension();
//
//            }else{
//                return response()->json([
//                    'hasil' => 'tidak ada gambar'
//                ]);
//            }
        //            $siswa = new siswa;
        //            $siswa->nis = $r->input('nis');
        //            $siswa->namaSiswa = $r->input('namaSiswa');
        //            $siswa->jenisKelamin = $r->input('jenisKelamin');
        //            $siswa->tanggalLahir = $r->input('tanggalLahir');
        //            $siswa->alamat = $r->input('alamat');
        //            $siswa->idKelas = $r->input('idKelas');
        //            $siswa->namaOrtu = $r->input('namaOrtu');
        //            $siswa->noHp = $r->input('noHp');


        //$upload->move(public_path().'/images/', $name);
        //$siswa->foto = public_path().'/images/'.$name;
        //$siswa->save();

//            return response()
//                ->json([
//                    'valid' => true,
//                    'sukses' => $siswa,
//                    'namafile' => $name
//                ]);
//        }
    }


}
