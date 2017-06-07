<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;


use App\Item;
use DB;
use Excel;

class MaatwebsiteDemoController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }
    public function downloadExcel($type)
    {
        $data = User::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {

        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['nom' => $value->nom, 'prenom' => $value->prenom, 'nom_fr' => $value->nom_fr,
                        'prenom_fr' => $value->prenom_fr,  'email' => $value->email, 'adresse' => $value->adresse
                        , 'telephone' => $value->telephone, 'password' => bcrypt($value->nom+$value->prenom), 'sexe' => $value->sexe, 'date_n' => $value->date_n
                        , 'lieu_n' => $value->lieu_n, 'spec' => $value->spec, 'situation_f' => $value->situation_f, 'nbr_enf' => $value->nbr_enf
                    ,'date_r' => $value->date_r,'sec_s'=>$value->sec_s];
                }
                if(!empty($insert)){
                    DB::table('enseignant')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }
        return Redirect::back()->with('message','تم الاستيراد بنجاح');
    }
    public function exportPDF()
    {
        $data = User::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download("pdf");
    }
}
