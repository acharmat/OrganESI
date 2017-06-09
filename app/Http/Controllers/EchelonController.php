<?php

namespace App\Http\Controllers;

use App\Echelon;
use Illuminate\Http\Request;
use App\User;
use Datatables;
use Redirect;

class EchelonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index($id){
        $user=User::find($id);

        return view('administration.echelons.index',['user'=>$user]);
    }
    public function modifier($id)
    {
        $echelon=Echelon::find($id);
        $user=User::find($echelon->id_ensg);

        return view('administration.echelons.modifier' , ['echelon'=>$echelon,'user'=>$user]);
    }
    public function supprimer($id)
    {
        $echelon=Echelon::find($id);
        $grade = $echelon->delete();
        return redirect::back()->with('message', 'تم حذف الحساب بنجاح');
    }


    public function update(Request $request )
    {
        $echelon = Echelon::find($request->id);
        $echelon->note = $request['note'];
        $echelon->Date = date('Y-m-d', strtotime(str_replace('-', '/', $request['Date'])));

        $echelon->save();
        $user=User::find($echelon->id_ensg);
        return Redirect::to('/administration/echelons/'.$user->id)->with('message', 'تم التعديل بنجاح');
    }

    public function anyData($id)
    {
        $echelon=Echelon::where('id_ensg',$id);

        $echelon = Echelon::select(['id','note','Date'])->where('id_ensg',$id);

        return Datatables::of($echelon)
            ->addColumn('action', function ($echelon) {
                return '<a href="/administration/echelons/'. $echelon->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/echelons/'. $echelon->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';

            })
            ->make(true);

    }
}
