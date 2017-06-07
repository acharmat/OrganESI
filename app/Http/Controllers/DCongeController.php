<?php

namespace App\Http\Controllers;

use App\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use Auth;


class DCongeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(){

        return view('enseignant.conge.index');
    }



    protected function store(Request $request  )
    {
        $conge=new Conge();
        $conge->Date_debut = date('Y-m-d', strtotime(str_replace('-', '/', $request['date_d'])));
        $conge->Date_fin = date('Y-m-d', strtotime(str_replace('-', '/', $request['date_f'])));
        $conge->Type = $request['type'];
        $conge->decision = 'مراجعة';
    $conge->id_ensg = Auth::user()->id;
    $conge->save();
        return redirect::to('/enseignant/conge')->with('message', 'تم الاضافة بنجاح');


    }


    public function anyData()
    {
        $id=Auth::user()->id;

        $conge=Conge::where('id_ensg',$id);

        $conge = Conge::select(['id','Date_debut','Date_fin','Type','decision'])->where('id_ensg',$id);

        return Datatables::of($conge)->make(true);

    }

}
