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
            ->addColumn('action', function ($datakelas){
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="showDetail(\''.$datakelas->idKelas.'\',\''.$datakelas->namaKelas.'\')">Edit<a/> &nbsp; 
                        <a class="btn-sm btn-danger" id="btn-delete" href="#">Delete</a>
                        <a class="btn-sm btn-danger" id="btn-test" href="#" onclick="test2(\''.$datakelas->idKelas.'\');">Delete</a>';
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
            'idKelas'   => 'required|max:10',
            'namaKelas' => 'required|max:255'
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function insert(Request $r){

        if ($this->isValid($r)->fails()){
            return response()->json([
                'valid' => false,
                'errors' => $this->isValid($r)->errors()->all()
            ]);
        }else{
            $kelas = new kelas;
            $kelas->idKelas = $r->input('idKelas');
            $kelas->namaKelas = $r->input('namaKelas');
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

        if ($this->isValid($r)->fails()){
            return response()->json([
                'valid' => false,
                'errors' => $this->isValid($r)->errors()->all()
            ]);
        }else{
            $oldid = $r->input('oldId');
            $data = [
                'idKelas' => $r->input('idKelas'),
                'namaKelas' => $r->input('namaKelas')
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
