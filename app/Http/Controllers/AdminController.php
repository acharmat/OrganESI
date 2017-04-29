<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AjouterAdminRequest;
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
        return redirect('/administration/admins')->withFlashMessage('تم الحذف بنجاح');
     }

    
 protected function store(AjouterAdminRequest $request ,Admin $user)
    {
        $user->create([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'nom_fr' => $request['nom_fr'],
            'prenom_fr' => $request['prenom_fr'],
            'photo' => $request['photo'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'password' => bcrypt($request['password']),
            'sexe' => $request['sexe'],
            'date_n' => $request['date_n'],
            'lieu_n' => $request['lieu_n'],
        ]);
        return redirect('/administration/admins')->withFlashMessage('تمت الاضافة بنجاح');
    }

 public function update(Request $request ,Admin $user)
    {
        $userupdate = $user->find($request->id);
        $userupdate->fill([$request->all()])->save();
        return Redirect::back()->withFlashMessage('تمت الاضافة بنجاح');
     }


 public function modifiermdp(Request $request ,Admin $user)
    {
        $userupdate = $user->find($request->id);
        $password = bcrypt($request['password']);
        $userupdate->fill( ['password' => $password ])->save();
        return redirect('/administration/admins')->withFlashMessage('تمت الاضافة بنجاح');
     }

public function anyData(Admin $user)
    {

      $users = $user->all();

        return Datatables::of($users)      
            ->addColumn('action', function ($user) {
                return '<a href="/administration/admins/'. $user->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/admins/'. $user->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';
                
                })
            ->make(true);

    }

     /*protected function update(AjouterAdminRequest $request ,Admin $user)
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
        return redirect('/administration/admins')->withFlashMessage('تمت الاضافة بنجاح');
    }
   /*protected function image_store(Request $request)
    {
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtention();
            Image::make($photo)->resize(300,300)->save(public_path('images/admins/'));

            $user = Auth::user();
            $user->photo = $filename;
            $user->save();
        }
        return view('administration.admins.ajouter');
    }*/
}
