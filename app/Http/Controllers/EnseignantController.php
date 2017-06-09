<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diplome;
use App\Grade;
use App\Decision;
use Datatables;
use Auth;

class EnseignantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $diplom=Diplome::where('id_ensg',$user->id)->orderBy('id', 'desc')->get();
        $grade=Grade::where('id_ensg',$user->id)->orderBy('id', 'desc')->first();

        return view('enseignant.index' , ['diplom'=>$diplom,'grade'=>$grade]);
    }

    public function conge(User $user){

        $user=Auth::user();
        return view('enseignant.conge.ajouter');
    }

    public function anyData()
    {
        $decision = Decision::select(['id', 'numero', 'sujet']);

        return Datatables::of($decision)
            ->addColumn('action', function ($decision) {
                return '<a href="/enseignant/decisions/'. $decision->id . '/visioner" class="btn btn-xs btn-primary">معاينة</a>
                ';

            })
            ->make(true);

    }

    public function visioner($id){

        $decision= Decision::where('id',$id)->first();
        return view('enseignant.decisions.visioner' ,['decision'=>$decision]);
    }
}
