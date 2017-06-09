<?php

namespace App\Http\Controllers;

use Excel;
use App\Item;
use DB;
use Redirect;

class ImportExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        return view('administration.importexport.index');
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
                        , 'lieu_n' => $value->lieu_n, 'spec' => $value->spec, 'situation_f' => $value->situation_f, 'nbr_enf' => $value->nbr_enf,'date_s' => $value->date_s
                        ,'sec_s'=>$value->sec_s,'date_r' => $value->date_r];
                }
                if(!empty($insert)){
                    DB::table('enseignant')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }
        return Redirect::back()->with('message','تم الاستيراد بنجاح');
    }


    public function downloadExcel($type)
    {
        Excel::create('OrganEsi', function($excel) {
            $excel->sheet('Information', function($sheet)
            {

                $enseignants=DB::table('enseignant')
                    ->Join('grade', 'grade.id_ensg', '=', 'enseignant.id')
                    ->Join('diplome', 'diplome.id_ensg', '=', 'enseignant.id')
                    ->Join('echelon', 'echelon.id_ensg', '=', 'enseignant.id')

                    ->select(['enseignant.id', 'enseignant.nom', 'enseignant.prenom','enseignant.nom_fr','enseignant.prenom_fr', 'enseignant.date_n',
                        'enseignant.lieu_n', 'enseignant.sexe', 'diplome.division', 'diplome.spec', 'grade.designation','echelon.note',
                        'enseignant.date_s', 'grade.Date_grad', 'enseignant.date_r', 'enseignant.statu', 'enseignant.sec_s',
                        'enseignant.fonction', 'enseignant.date_f'])
                    ->distinct()->get();

                foreach($enseignants as $enseignant) {
                    $data[] = array(
                        "id"=> $enseignant->id,
                        "nom"=> $enseignant->nom,
                        "prenom"=> $enseignant->prenom,
                        "nom_fr"=> $enseignant->nom_fr,
                        "prenom_fr"=> $enseignant->prenom_fr,
                        "date_n"=> $enseignant->date_n,
                        "lieu_n"=> $enseignant->lieu_n,
                        "sexe"=> $enseignant->sexe,

                        "division"=> $enseignant->division,
                        "spec"=> $enseignant->spec,
                        "designation"=> $enseignant->designation,
                        "note"=> $enseignant->note,

                        "date_s"=> $enseignant->date_s,
                        "Date_grad"=> $enseignant->Date_grad,
                        "date_r"=> $enseignant->date_r,
                        "statu"=> $enseignant->statu,
                        "sec_s"=> $enseignant->sec_s,
                        "fonction"=> $enseignant->fonction,
                        "date_f"=> $enseignant->date_f,



                    );
                }

                $sheet->fromArray($data, null, 'A1',  false, false);
                $sheet->setRightToLeft(true);

                $headings = array('الرقم', 'الاسم', 'اللقب', 'اللقب باللاتينية', 'الاسم باللاتينية', 'تاريخ الميلاد', 'مكان الميلاد', 'الجنس', 'الشعبة', 'التخصص', 'الرتبة الحالية','التصنيف', 'تاريخ أول توظيف', 'تاريخ التعيين في الرتبة الحالية', 'تاريخ الالتحاق بالمدرسة', 'الوضعية القانونية', 'رقم الضمان الاجتماعي', 'المنصب العالي المشغول بدقة', 'تاريخ التعيين في المنصب');
                $sheet->prependRow( $headings);

            });
        })->download($type);
    }



}
