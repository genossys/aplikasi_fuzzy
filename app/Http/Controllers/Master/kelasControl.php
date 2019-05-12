<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\kelas;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class kelasControl extends Controller
{
    //

    public function index(){

        return view('admin.master.datakelas');
    }



    public function getData(){

        $datakelas = kelas::query()
            ->select('idKelas','namaKelas')
            ->orderBy('idKelas', 'ASC')
            ->get();

        return DataTables::of($datakelas)
<<<<<<< HEAD

            ->addColumn('action', function ($datakelas){
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="showDetail(\''.$datakelas->idKelas.'\',\''.$datakelas->namaKelas.'\')">Edit<a/> &nbsp; 
                        <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="javascript:if (confirm(\'Apakah Anda Yakin Menghapus Data '.$datakelas->idKelas.' \'))deleteDataKelas(\''.$datakelas->idKelas.'\')">Delete</a>';

=======
            ->addColumn('action', function ($datakelas){
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="showDetail(\''.$datakelas->idKelas.'\',\''.$datakelas->namaKelas.'\')"><i class="fa fa-edit"></i><a/> 
                        <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="javascript:if (confirm(\'Apakah Anda Yakin Menghapus Data '.$datakelas->idKelas.' \'))deleteDataKelas(\''.$datakelas->idKelas.'\')"><i class="fa fa-trash"></i></a>';
>>>>>>> 49734696022fbdcf89e4d0097c6fcf374283890c
            })
            ->addIndexColumn()
            ->make(true);
        }


    private function isValidInsert(Request $r){
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rulesInsert = [
            'txtIdKelas'   => 'required|max:10',
            'txtNamaKelas' => 'required|max:255'
        ];
        return Validator::make($r->all(), $rulesInsert, $messages);

    }
    private function isValidUpdate(Request $r){
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rulesEdit = [
            'txtNamaKelasEdit' => 'required|max:255',
            'txtIdKelasEdit' => 'required|max:10'
        ];

        return Validator::make($r->all(), $rulesEdit, $messages);

    }

    public function insert(Request $r){

        if ($this->isValidInsert($r)->fails()){
            return response()->json([
                'valid' => false,
                'errors' => $this->isValidInsert($r)->errors()->all()
            ]);
        }else{
            $kelas = new kelas;
            $kelas->idKelas = $r->txtIdKelas;
            $kelas->namaKelas = $r->txtNamaKelas;
            $kelas->save();
            return response()
                ->json([
                    'valid' => true,
                    'sukses' => $kelas,
                    'url' => 'kelas/dataKelas'
                ]);
        }

    }

    public function update(Request $r){

        if ($this->isValidUpdate($r)->fails()){
            return response()->json([
                'valid' => false,
                'errors' => $this->isValidUpdate($r)->errors()->all()
            ]);
        }else{
            $oldid = $r->txtOldIdKelas;
            $data = [
                'idKelas' => $r->txtIdKelasEdit,
                'namaKelas' => $r->txtNamaKelasEdit
            ];
            kelas::query()
                ->where('idKelas','=',$oldid)
                ->update($data);
            return response()
                ->json([
                    'valid' => true,
                    'sukses' => $data,
                    'url' => 'kelas/dataKelas'
                ]);
        }

    }

    public function delete(Request $r){
        $id = $r->input('idKelas');
        kelas::destroy($id);
        return response()->json([
           'sukses' => 'Berhasil Di hapus',
            'url' => 'kelas/dataKelas'
        ]);

    }

    public function sendWA(){

// Pull messages (for push messages please go to settings of the number)
        $my_apikey = "44OEL1G27CB6XFS8HM36";
        $destination = "628975050520";
        $message = "test API WA bos";
        $api_url = "http://panel.apiwha.com/send_message.php";
        $api_url .= "?apikey=". urlencode ($my_apikey);
        $api_url .= "&number=". urlencode ($destination);
        $api_url .= "&text=". urlencode ($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));
        echo "<br>Result: ". $my_result_object->success;
        echo "<br>Description: ". $my_result_object->description;
        echo "<br>Code: ". $my_result_object->result_code;
    }
}
