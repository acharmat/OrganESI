<?php

namespace App\Http\Controllers;

use App\Grade;
use App\User;
use Illuminate\Http\Request;
use Datatables;
use Redirect;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index($id){

        $user=User::find($id);
        return view('administration.grades.index',['user'=>$user]);
    }
    public function modifier($id)
    {
        $grade=Grade::find($id);
       $user=User::find($grade->id_ensg);

        return view('administration.grades.modifier' , ['grade'=>$grade,'user'=>$user]);
    }
    public function supprimer(Grade $grade)
    {
        $grade = $grade->delete();
        return redirect::back()->with('message', 'تم الحذف بنجاح');
    }


    public function update(Request $request )
    {
        $grade = Grade::find($request->id);
        $grade->designation = $request['designation'];
            $grade->Date_grad = date('Y-m-d', strtotime(str_replace('-', '/', $request['Date_grad'])));

        $grade->save();
        $user=User::find($grade->id_ensg);
        return Redirect::to('/administration/grades/'.$user->id)->with('message', 'تم التعديل بنجاح');
    }

    public function anyData($id)
    {
        $grade=Grade::where('id_ensg',$id);

        $grades = Grade::select(['id','designation','Date_grad'])->where('id_ensg',$id);

        return Datatables::of($grades)
            ->addColumn('action', function ($grade) {
                return '<a href="/administration/grades/'. $grade->id . '/modifier" class="btn btn-xs btn-warning" >تعديل</a>
                <a href="/administration/grades/'. $grade->id . '/supprimer" class="btn btn-xs btn-danger">حذف</a>';

            })
            ->make(true);

    }

}
