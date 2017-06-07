<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use User;
use Illuminate\Support\Facades\DB;



class CompteController extends Controller
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
    public function index(){

        return view('enseignant.compte.index');
    }

    public function modifiermdp( Request $request)
    {
        $user = Auth::user();
        $password = bcrypt($request['password']);

        DB::table('enseignant')
            ->where('id', $user->getAuthIdentifier())
            ->update(['password' => $password]);

        return Redirect::back()->with('message', 'تم التعديل بنجاح');
        }

}
