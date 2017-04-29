<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AjouterEnseignantRequest;
use App\User;

class EnseignantsController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(User $user){
      $user = $user->all();
      return view('administration.enseignants.index', compact('user'));
    }

    public function ajouter()
    {
        return view('administration.enseignants.ajouter');
    }

    public function modifier(User $user)
    {
          return view('administration.enseignants.modifier' , compact('user'));
    }
    
 protected function store(AjouterEnseignantRequest $request ,User $user)
    {
        $user->create([
            'sec_s' => $request['sec_s'],
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'nom_fr' => $request['nom_fr'],
            'prenom_fr' => $request['prenom_fr'],
            'photo' => $request['photo'],
            'email' => $request['email'],
            'adresse' => $request['adresse'],
            'telephone' => $request['telephone'],
            'password' => bcrypt($request['password']),
            'sexe' => $request['sexe'],
            'date_n' => $request['date_n'],
            'lieu_n' => $request['lieu_n'],
            'spec' => $request['spec'],
            'situation_f' => $request['situation_f'],
            'nbr_enf' => $request['nbr_enf'],
            'date_r' => $request['date_r'],
        ]);
        return redirect('/administration/enseignants')->withFlashMessage('تمت الاضافة بنجاح');
    }

 /*protected function update(AjouterEnseignantRequest $request ,User $user)
    {
        $user->create([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'telephone' => $request['telephone'],
            'date_n' => $request['date_n'],
            'lieu_n' => $request['lieu_n'],
            'sexe' => $request['sexe'],
        ]);
        return redirect('/administration/enseignants')->withFlashMessage('تمت الاضافة بنجاح');
    }*/


 }

