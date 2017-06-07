<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diplome;
use App\Grade;
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
}
