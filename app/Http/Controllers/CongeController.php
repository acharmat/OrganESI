<?php

namespace App\Http\Controllers;

use App\Conge;
use App\Grade;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AjouterCongeRequest;
use Datatables;


class CongeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index(){
        return view('administration.conge.index');
    }

    public function visioner(User $user,$id){
        $conge= Conge::where('id',$id)->first();
        $user=User::find($conge->id_ensg);
        $grade=Grade::where('id_ensg',$conge->id_ensg)->orderBy('id', 'desc')->first();

        return view('administration.conge.visioner' ,['conge'=>$conge,'user'=>$user,'grade'=>$grade]);
    }


    public function ajouter(User $user)
    {
        $user=User::all();

        return view('administration.conge.ajouter',['user'=>$user]);
    }
    public function modifier(User $user,$id)
    {

        $conge= Conge::where('id',$id)->first();
        $user=User::find($conge->id_ensg);
        return view('administration.conge.modifier' ,['conge'=>$conge,'user'=>$user]);
    }
    public function supprimer(Conge $conge)
    {
        $conge = $conge->delete();
        return redirect::back()->with('message', 'تم حذف الاجازة بنجاح');
    }



    protected function store(Request $request  )
    {
        $conge=new Conge();
        $conge->Date_debut = date('Y-m-d', strtotime(str_replace('-', '/', $request['date_d'])));
        $conge->Date_fin = date('Y-m-d', strtotime(str_replace('-', '/', $request['date_f'])));
        $conge->Type = $request['type'];
        $conge->decision = 'مقبول';
    $conge->id_ensg = $request['id_ensg'];
    $conge->save();
        return redirect::to('/administration/conge')->with('message', 'تم الاضافة بنجاح');


    }



    public function update(Request $request )
    {
        $conge = Conge::find($request->id);
        $conge->Date_debut=date('Y-m-d', strtotime(str_replace('-', '/', $request['date_d'])));
        $conge->Date_fin=date('Y-m-d', strtotime(str_replace('-', '/', $request['date_f'])));
        $conge->Type=$request['type'];
        $conge->decision=$request['decision'];

        $conge->save();
        return Redirect::to('/administration/conge')->with('message', 'تم التعديل بنجاح');
    }



    public function anyData()
    {
        $conge = Conge::join('enseignant', 'conge.id_ensg', '=', 'enseignant.id')
            ->select(['conge.id', 'enseignant.nom', 'enseignant.prenom', 'conge.Date_debut', 'conge.Date_fin', 'conge.decision', 'conge.Type']);

        return Datatables::of($conge)
        ->addColumn('action', function ($conge) {
            if ($conge->decision == "مقبول")  {
                return '<a href="/administration/conge/'. $conge->id . '/visioner" class="btn btn-xs btn-primary">طباعة</a>
                <a href="/administration/conge/'. $conge->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/conge/'. $conge->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>
                ';} else {
                return '<a href="/administration/conge/' . $conge->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/conge/' . $conge->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';
            }
            })
            ->make(true);





    }

}
