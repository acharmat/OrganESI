<?php

namespace App\Http\Controllers;

use App\Titularisation;
use Illuminate\Http\Request;
use App\User;
use Datatables;
use Redirect;

class TitularisationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index($id){
        $user=User::find($id);

        return view('administration.titularisations.index',['user'=>$user]);
    }
    public function modifier($id)
    {
        $titularisation=Titularisation::find($id);
        $user=User::find($titularisation->id_ensg);

        return view('administration.titularisations.modifier' , ['titularisation'=>$titularisation,'user'=>$user]);
    }
    public function supprimer($id)
    {
        $titularisation=Titularisation::find($id);
        $grade = $titularisation->delete();
        return redirect::back()->with('message', 'تم حذف الحساب بنجاح');
    }


    public function update(Request $request )
    {
        $titularisation = Titularisation::find($request->id);
        $titularisation->note = $request['note'];
        $titularisation->Date = date('Y-m-d', strtotime(str_replace('-', '/', $request['Date'])));

        $titularisation->save();
        $user=User::find($titularisation->id_ensg);
        return Redirect::to('/administration/titularisations/'.$user->id)->with('message', 'تم التعديل بنجاح');
    }

    public function anyData($id)
    {
        $titularisation=Titularisation::where('id_ensg',$id);

        $titularisations = Titularisation::select(['id','note','Date'])->where('id_ensg',$id);

        return Datatables::of($titularisations)
            ->addColumn('action', function ($titularisation) {
                return '<a href="/administration/titularisations/'. $titularisation->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/titularisations/'. $titularisation->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';

            })
            ->make(true);

    }
}
