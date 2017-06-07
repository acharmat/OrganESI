<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AjouterEnseignantRequest;
use App\User;
use App\Diplome;
use App\Grade;
use App\Titularisation;
use Image;
use Datatables;
use Auth;


class EnseignantsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
public function __construct()
    {
        $this->middleware('auth:admin');

    }

   public function index(){
      return view('administration.enseignants.index');
    }

    public function ajouter()
    {
        return view('administration.enseignants.ajouter');
    }

    public function visioner(User $user,$id){
        $conge= Conge::where('id',$id)->first();
        $user=User::find($conge->id_ensg);
        $grade=Grade::where('id_ensg',$conge->id_ensg)->orderBy('id', 'desc')->first();

        return view('administration.conge.visioner' ,['conge'=>$conge,'user'=>$user,'grade'=>$grade]);
    }


    public function ajouterDiplome()
    {
        return view('administration.enseignants.ajouterDiplome');
    }

    public function modifier(User $user)
    {
        $diplom=Diplome::where('id_ensg',$user->id)->orderBy('id', 'desc')->get();
        $grade=Grade::where('id_ensg',$user->id)->orderBy('id', 'desc')->first();
     $titularisation=Titularisation::where('id_ensg',$user->id)->orderBy('id', 'desc')->first();


        return view('administration.enseignants.modifier' , ['user'=>$user,'diplom'=>$diplom,'grade'=>$grade,'titularisation'=>$titularisation]);
    }
     public function supprimer(User $user)
    {
        $user = $user->delete();
        return redirect::back()->with('message', 'تم حذف الحساب بنجاح');
     }


    protected function store(AjouterEnseignantRequest $request ,User $user)
    {
        $enseignant = $user->create([
           'sec_s' => $request['sec_s'],
           'situation_f' => $request['situation_f'],
           'nbr_enf' => $request['nbr_enf'],
           'date_r' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_r']))),
           'statu' => $request['statu'],
            'date_s' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_s']))),
           'nom' => $request['nom'],
           'prenom' => $request['prenom'],
            'nom_fr' => $request['nom_fr'],
            'prenom_fr' => $request['prenom_fr'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'adresse' => $request['adresse'],
            'password' => bcrypt($request['sec_s']),
            'sexe' => $request['sexe'],
            'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
            'lieu_n' => $request['lieu_n'],
        ]);
        return redirect::to('/administration/enseignants/'.$enseignant->id.'/modifier')->with('message', 'تم الاضافة بنجاح');
    }



    protected function store_diplome(Request $request ,Diplome $diplome)
    {

        $enseignant= User::find($request->id);
        $diplome->create([
            'nom_Dip' => $request['nom_Dip'],
            'Date_Dip' => date('Y-m-d', strtotime(str_replace('-', '/', $request['Date_Dip']))),
            'spec' => $request['spec'],
            'division' => $request['division'],
            'id_ensg' => $enseignant->id,
        ]);
        return redirect::to('/administration/enseignants/'.$enseignant->id.'/modifier')->with('message', 'تم الاضافة بنجاح');
    }


    public function update(Request $request ,User $user)
    {
        $userupdate = $user->find($request->id);
        $userupdate->fill([
            'sec_s' => $request['sec_s'],
            'situation_f' => $request['situation_f'],
            'nbr_enf' => $request['nbr_enf'],
            'date_r' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_r']))),
            'statu' => $request['statu'],
            'date_s' =>  date('Y-m-d', strtotime(str_replace('-', '/', $request['date_s']))),
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'nom_fr' => $request['nom_fr'],
            'prenom_fr' => $request['prenom_fr'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'adresse' => $request['adresse'],
            'password' => bcrypt($request['sec_s']),
            'sexe' => $request['sexe'],
            'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
            'lieu_n' => $request['lieu_n'],
        ])->save();
        return Redirect::back()->with('message', 'تم التعديل بنجاح');
    }

    public function modifierphoto(Request $request, User $user){
        $userupdate = $user->find($request->id);
        $avatar = $request->file('photo');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/images/' . $filename ) );
        $userupdate->fill( ['photo' => $filename] )->save();
        return Redirect::back()->with('message', 'تم التعديل بنجاح');
    }

    public function modifiermdp(Request $request ,User $user)
    {
        $userupdate = $user->find($request->id);
        $password = bcrypt($request['password']);
        $userupdate->fill( ['password' => $password ])->save();
        return Redirect::back()->with('message', 'تم التعديل بنجاح');
    }

    public function anyData(User $user)
    {

        $users = User::select(['id','sec_s', 'nom', 'prenom', 'email', 'telephone', 'sexe']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="/administration/enseignants/'. $user->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/enseignants/'. $user->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';

            })
            ->make(true);

    }

    protected function store_grade(Request $request ,Grade $grade)
    {

        $enseignant= User::find($request->id);
        $grade->create([
            'designation' => $request['designation'],
            'Date_grad' => date('Y-m-d', strtotime(str_replace('-', '/', $request['Date_grad']))),
            'id_ensg' => $enseignant->id,

        ]);
        return redirect::to('/administration/enseignants/'.$enseignant->id.'/modifier')->with('message', 'تم الاضافة بنجاح');
    }

    protected function store_titularisation(Request $request ,Titularisation $titularisation)
    {

        $enseignant= User::find($request->id);
        $titularisation->create([
            'note' => $request['note'],
            'Date' => date('Y-m-d', strtotime(str_replace('-', '/', $request['Date']))),
            'id_ensg' => $enseignant->id,

        ]);
        return redirect::to('/administration/enseignants/'.$enseignant->id.'/modifier')->with('message', 'تم الاضافة بنجاح');
    }


}
