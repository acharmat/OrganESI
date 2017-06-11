<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AjouterAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

use App\Admin;
use Image;
use Datatables;


class AdminController extends Controller
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
      return view('administration.admins.index');
    }

    public function ajouter()
    {
        return view('administration.admins.ajouter');
    }

    public function modifier(Admin $user)
    {
          return view('administration.admins.modifier' , compact('user'));
    }
     public function supprimer(Admin $user)
    {
        $user = $user->delete();
        return redirect::back()->with('message', 'تم حذف الحساب بنجاح');
     }

    
 protected function store(AjouterAdminRequest $request ,Admin $user)
    {
       $admin = $user->create([

            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'nom_fr' => $request['nom_fr'],
            'prenom_fr' => $request['prenom_fr'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'adresse' => $request['adresse'],
            'password' => bcrypt($request['password']),
            'sexe' => $request['sexe'],
            'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
            'lieu_n' => $request['lieu_n'],
        ]);

        return redirect::to('/administration/admins/'.$admin->id.'/modifier')->with('message', 'تم الاضافة بنجاح');
    }

 public function update(UpdateAdminRequest $request ,Admin $user)
    {
        $userupdate = $user->find($request->id);
        $userupdate->fill([
                    'nom' => $request['nom'],
                    'prenom' => $request['prenom'],
                    'nom_fr' => $request['nom_fr'],
                    'prenom_fr' => $request['prenom_fr'],
                    'email' => $request['email'],
                    'adresse' => $request['adresse'],
                    'sexe' => $request['sexe'],
                    'telephone' => $request['telephone'],
                    'date_n' => date('Y-m-d', strtotime(str_replace('-', '/', $request['date_n']))),
                    'lieu_n' => $request['lieu_n'],
        ])->save();
        return Redirect::back()->with('message', 'تم التعديل بنجاح');
     }


 public function modifiermdp(Request $request ,Admin $user)
    {
        $userupdate = $user->find($request->id);
        $password = bcrypt($request['password']);
        $userupdate->fill( ['password' => $password ])->save();
        return Redirect::back()->with('message', 'تم التعديل بنجاح');
     }

    public function modifierphoto(Request $request, Admin $user){
         $userupdate = $user->find($request->id);
    		$avatar = $request->file('photo');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/images/' . $filename ) );
         $userupdate->fill( ['photo' => $filename] )->save();
        return Redirect::back()->with('message', 'تم التعديل بنجاح');
    }

public function anyData(Admin $user)
    {

      $users = Admin::select(['id', 'nom', 'prenom', 'email', 'telephone', 'sexe']);

        return Datatables::of($users)      
            ->addColumn('action', function ($user) {
                return '<a href="/administration/admins/'. $user->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/admins/'. $user->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';
                
                })
            ->make(true);

    }

}
