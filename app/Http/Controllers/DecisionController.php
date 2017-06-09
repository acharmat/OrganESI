<?php

namespace App\Http\Controllers;
use App\Admin;
use App\User;
use Auth;
use App\Decision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AjouterCongeRequest;
use Datatables;


class DecisionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index(){
        return view('administration.decisions.index');
    }
    public function ajouter(User $user)
    {
        return view('administration.decisions.ajouter');
    }

    public function visioner(User $user,$id){
        $decision= Decision::where('id',$id)->first();
        $admin=Admin::find($decision->id_admin);
        return view('administration.decisions.visioner' ,['decision'=>$decision,'admin'=>$admin]);
    }

    public function modifier(User $user,$id)
    {
        $decision= Decision::where('id',$id)->first();
        $admin=Admin::find($decision->id_admin);

        return view('administration.decisions.modifier' ,['decision'=>$decision,'admin'=>$admin]);
    }
    public function supprimer(Decision $decision)
    {
        $conge = $decision->delete();
        return redirect::back()->with('message', 'تم حذف القرار بنجاح');
    }



    protected function store(Request $request  )
    {
        $decision=new Decision();
        $decision->numero = $request['numero'];
        $decision->sujet = $request['sujet'];
        $decision->contenu = $request['contenu'];
        $decision->id_admin = Auth::user()->id ;

        $decision->save();
        return redirect::to('/administration/decisions/')->with('message', 'تم الاضافة بنجاح');


    }



    public function update(Request $request )
    {
        $decision = Decision::find($request->id);
        $decision->numero=$request['numero'];
        $decision->sujet=$request['sujet'];
        $decision->contenu=$request['contenu'];
        $decision->save();
        return Redirect::back()->with('message', 'تم التعديل بنجاح');
    }




    public function anyData()
    {
        $decision = Decision::join('administrateur', 'decision.id_admin', '=', 'administrateur.id')
            ->select(['decision.id', 'administrateur.nom', 'administrateur.prenom', 'decision.numero', 'decision.sujet']);

        return Datatables::of($decision)
            ->addColumn('action', function ($decision) {
                return '<a href="/administration/decisions/'. $decision->id . '/visioner" class="btn btn-xs btn-primary">طباعة القرار</a>
                <a href="/administration/decisions/'. $decision->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/decisions/'. $decision->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>
                ';

            })
            ->make(true);

    }

}
