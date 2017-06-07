<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use App\Diplome;
use App\User;
use Illuminate\Http\Request;
use Datatables;

class DiplomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

    }


    public function index($id){
        $user=User::find($id);

        return view('administration.diplomes.index',['user'=>$user]);
    }

    public function ajouter()
    {
        return view('administration.diplomes.ajouter');
    }
    public function modifier($id)
    {

        $diplome= Diplome::where('id',$id)->first();
        $user=User::find($diplome->id_ensg);
        return view('administration.diplomes.modifier' ,['diplome'=>$diplome,'user'=>$user]);
    }

    public function supprimer(Diplome $diplome)
    {
        $diplome = $diplome->delete();
        return redirect::back()->with('message', 'تم الحذف بنجاح');
    }




    public function update(Request $request ,Diplome $diplome)
    {

        $diplomeupdate = $diplome->find($request['id']);
        $user=User::find($diplomeupdate->id_ensg);
        $diplomeupdate->nom_Dip=$request['nom_Dip'];
        $diplomeupdate->division=$request['division'];
        $diplomeupdate->Date_Dip=date('Y-m-d', strtotime(str_replace('-', '/', $request['Date_Dip'])));
        $diplomeupdate->spec=$request['spec'];
        $diplomeupdate->save();
        return redirect::to('/administration/diplomes/'.$user->id)->with('message', 'تم التعديل بنجاح');

    }



    public function anyData($id)
    {
        $diplom=Diplome::where('id_ensg',$id);

        $diplomes = Diplome::select(['id','nom_Dip','Date_Dip'])->where('id_ensg',$id);

        return Datatables::of($diplomes)
            ->addColumn('action', function ($diplom) {
                return '<a href="/administration/diplomes/'. $diplom->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/diplomes/'. $diplom->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';

            })
            ->make(true);

    }
}
