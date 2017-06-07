@extends('administration.layouts.layout')

@section('title')
تعديل معلومات الأستاذ
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
<section class="content-header">
     <h1>     
     تعديل معلومات الأستاذ
      {{ $user->nom }}
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li><a href="{{ url('/administration/enseignants') }}">الأساتذة</a></li>
       <li class="active"><a href="{{ url('/administration/enseignants/'. $user->id .'/modifier') }}">تعديل معلومات الأستاذ</a></li>
     </ol>
   </section>

       <section class="content">

      <div class="row">
        <div class="col-md-9">
         <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">المعلومات الشخصية</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
         </div>
            <!-- form start -->
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/enseignants/update') }}">
              {{ csrf_field() }}
            <input type="hidden" value="{{ $user->id }}" name="id">


    <div class="box-body">
                <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group{{ $errors->has('sec_s') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="sec_s" class="control-label">رقم الضمان الاجتماعي</label>
                                        <input id="sec_s" type="text" class="form-control" name="sec_s" value="{{ $user->sec_s}}" autofocus>
                                        @if ($errors->has('sec_s'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('sec_s') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="nom" class="control-label">اللقب</label>
                                        <input id="nom" type="text" class="form-control" name="nom" value="{{ $user->nom }}" autofocus>
                                        @if ($errors->has('nom'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('prenom_fr') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="prenom_fr" class="control-label">الاسم باللاتينية</label>
                                        <input id="prenom_fr" type="text" class="form-control" name="prenom_fr" value="{{ $user->prenom_fr }}"  autofocus>
                                        @if ($errors->has('prenom_fr'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('prenom_fr') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <div class="col-md-12">
                                        <label for="email" class="control-label">البريد الالكتروني</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('nbr_enf') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="nbr_enf" class="control-label">عدد الاطفال</label>
                                        <input id="nbr_enf" type="text" class="form-control" name="nbr_enf" value="{{ $user->nbr_enf }}"  autofocus>
                                        @if ($errors->has('nbr_enf'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('nbr_enf') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">

                                <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="prenom" class="control-label">الاسم</label>
                                        <input id="prenom" type="text" class="form-control" name="prenom" value="{{ $user->prenom }}"  autofocus>
                                        @if ($errors->has('prenom'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('nom_fr') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="nom_fr" class="control-label">اللقب باللاتينية</label>
                                        <input id="nom_fr" type="text" class="form-control" name="nom_fr" value="{{ $user->nom_fr}}"  autofocus>
                                        @if ($errors->has('nom_fr'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('nom_fr') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="telephone" class="control-label">رقم الهاتف</label>
                                        <input id="telephone" type="text" class="form-control" name="telephone" value="{{ $user->telephone}}"  autofocus>
                                        @if ($errors->has('telephone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="situation_f" class="control-label">الحالة الاجتماعية</label>
                                        {{ Form::select(
                                            'situation_f',
                                            array('أعزب' => 'أعزب', 'متزوج' => 'متزوج','مطلق' => 'مطلق', 'أرمل' => 'أرمل'),
                                            $user->situation_f,
                                            [
                                                'class' => 'form-control'
                                            ]
                                        ) }}

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">

                                <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="adresse" class="control-label">العنوان</label>
                                        <input type="text" id="adresse" name="adresse" class="form-control"  value="{{ $user->adresse}}"  autofocus></textarea>
                                        @if ($errors->has('adresse'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="sexe" class="control-label">الجنس</label>
                                        {{ Form::select(
                                            'sexe',
                                            array('ذكر' => 'ذكر', 'أنثى' => 'أنثى'),
                                            $user->sexe,
                                            [
                                                'class' => 'form-control'
                                            ]
                                        ) }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-4">

                                <div class="form-group{{ $errors->has('lieu_n') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="lieu_n" class="control-label">مكان الميلاد</label>
                                        <input id="lieu_n" type="lieu_n" class="form-control" name="lieu_n" value="{{$user->lieu_n }}" >
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-4">

                                <div class="form-group{{ $errors->has('date_n') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="datepicker" class="control-label">تاريخ الميلاد</label>
                                        <input type="text" id="datepicker" class="form-control" name="date_n" value="{{$user->date_n }}" >
                                    </div>
                                </div>
                            </div>




                            <div class="col-xs-4 ">

                                <div class="form-group{{ $errors->has('date_s') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="datepicker1" class="control-label">تاريخ أول توظيف</label>
                                        <input type="text" id="datepicker1" class="form-control" name="date_s" value="{{ $user->date_s}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">

                                <div class="form-group{{ $errors->has('statu') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="statu" class="control-label">الوضعية القانونية</label>
                                        {{ Form::select(
                                           'statu',
                                           array('مرسم' => 'مرسم', 'متربص' => 'متربص'),
                                           $user->statu,
                                           [
                                               'class' => 'form-control'
                                           ]
                                       ) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 ">

                                <div class="form-group{{ $errors->has('date_r') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="datepicker2" class="control-label">تاريخ الالتحاق بالمدرسة</label>
                                        <input type="text" id="datepicker2" class="form-control" name="date_r" value="{{ $user->date_r }}" >
                                    </div>
                                </div>
                            </div>

                </div>
    </div>
               <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-left">حفظ التعديلات</button>
              </div>
            </form>
          </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">الشهادات</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/enseignants/stor_diplome') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-xs-6">

                                <div class="form-group{{ $errors->has('Date_Dip') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="datepicker3" class="control-label">تاريخ الحصول على الشهادة</label>
                                        <input type="text" id="datepicker3" class="form-control" name="Date_Dip" value="{{ old('Date_Dip') }}" >
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('nom_Dip') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="nom_Dip" class="control-label">نوع الشهادة</label>
                                        <select class="form-control" name="nom_Dip">
                                            <option value="بكالوريا">بكالوريا</option>
                                            <option value="ليسانس">ليسانس</option>
                                            <option value="مهندس">مهندس</option>
                                            <option value="ماستر">ماستر</option>
                                            <option value="ماجستر">ماجستر</option>
                                            <option value="دكتوراه">دكتوراه</option>

                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="col-xs-6">

                                <div class="form-group{{ $errors->has('spec') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="spec" class="control-label">التخصص</label>
                                        <select class="form-control" name="spec">
                                            <option value="اعلام الي">اعلام الي</option>
                                            <option value="الكترونيك">الكترونيك</option>
                                            <option value="رياضيات">رياضيات</option>
                                            <option value="فيزياء">فيزياء</option>
                                            <option value="لغة انجليزية">لغة انجليزية</option>
                                            <option value="لغة فرنسية">لغة فرنسية</option>

                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="col-xs-6">

                                <div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="division" class="control-label">الشعبة</label>
                                        <select class="form-control" name="division">
                                            <option value="رياضيات و اعلام الي">رياضيات و اعلام الي</option>
                                            <option value="الكترونيك">الكترونيك</option>
                                            <option value="رياضيات">رياضيات</option>
                                            <option value="فيزياء">فيزياء</option>
                                            <option value="لغات">لغات</option>
                                        </select>
                                    </div>
                                </div></div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left">اضافة شهادة</button>
                    </div>
                </form>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">الرتبة</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/enseignants/store_grade') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-6">

                                <div class="form-group{{ $errors->has('Date_grad') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="datepicker3" class="control-label">تاريخ التعيين</label>
                                        <input type="text" id="datepicker4" class="form-control" name="Date_grad" value="{{ old('Date_grad') }}" >
                                    </div>
                                </div>

                            </div>


                            <div class="col-xs-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="designation" class="control-label">الرتبة</label>
                                        <select class="form-control" name="designation">
                                            <option value="أستاذ مساعد قسم ب">أستاذ مساعد قسم ب</option>
                                            <option value="أستاذ مساعد قسم أ">أستاذ مساعد قسم أ</option>
                                            <option value="أستاذ محاضر قسم ب">أستاذ محاضر قسم ب</option>
                                            <option value="أستاذ محاضر قسم أ">أستاذ محاضر قسم أ</option>
                                            <option value="بروفيسور">بروفيسور</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left">اضافة رتبة</button>
                    </div>
                </form>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">الدرجة</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/enseignants/store_titularisation') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <div class="box-body">
                        <div class="row">



                            <div class="col-xs-6">

                                <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="datepicker5" class="control-label">تاريخ التعيين</label>
                                        <input type="text" id="datepicker5" class="form-control" name="Date" value="{{ old('Date') }}" >
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="note" class="control-label">الدرجة</label>
                                        <select class="form-control" name="note">
                                            <option value="01">قسم فرعي 01</option>
                                            <option value="02">قسم فرعي 02</option>
                                            <option value="03">قسم فرعي 03</option>
                                            <option value="04">قسم فرعي 04</option>
                                            <option value="05">قسم فرعي 05</option>
                                            <option value="06">قسم فرعي 06</option>
                                            <option value="07">قسم فرعي 07</option>
                                            <option value="08">قسم فرعي 08</option>
                                            <option value="09">قسم فرعي 09</option>
                                            <option value="10">قسم فرعي 10</option>
                                            <option value="11">قسم فرعي 11</option>
                                            <option value="12">قسم فرعي 12</option>

                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left">اضافة درجة</button>
                    </div>
                </form>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تغيير كلمة المرور</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/enseignants/changemdp') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-xs-6">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="password-confirm" class="control-label">اعادة كلمة المرور</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-6">

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="password" class="control-label">كلمة المرور</label>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left">حفظ التعديلات</button>
                    </div>
                </form>
            </div>

      </div>


           <!-- /.col -->
                 <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">الصورة الشخصية</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ url('/images/'. $user->photo .'/') }}"  alt="User profile picture">
              <h3 class="profile-username text-center">{{ $user->nom }} {{ $user->prenom }}</h3>
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/enseignants/changetof') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" value="{{ $user->id }}" name="id">
                <div class="col-md-12">
                  <input  type="file" class="form-control" name="photo">
                </div>
            </div>

            <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-left">تعديل الصورة</button>
                </div>
                </form>

          </div>
          <!-- /.box -->


          <!-- About Me Box -->
          <div class="box box-primary">

              <div class="box-header with-border">
              <h3 class="box-title">الشهادات</h3>
                  <div class="box-tools pull-right">
                      <button type="button"  class="btn btn-box-tool dropdown-toggle">
                      <a title="تعديل الشهادات" href="/administration/diplomes/{{$user->id}}"><i class="fa fa-wrench"></i></a> </button>
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>
                    @foreach($diplom as $diplom)
                        <a href="/administration/diplomes/{{$diplom->id}}/modifier" class="label label-success">{{$diplom->nom_Dip}}</a>
                    @endforeach
                </p>

            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-primary">

                         <div class="box-header with-border">
                             <h3 class="box-title">الرتبة الحالية</h3>
                             <div class="box-tools pull-right">
                                 <button type="button"  class="btn btn-box-tool dropdown-toggle">
                                     <a title="تعديل الرتب" href="/administration/grades/{{$user->id}}"><i class="fa fa-wrench"></i></a> </button>
                                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                 </button>
                             </div>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <p>
                                 @if($grade)<a  href="/administration/grades/{{$grade->id}}/modifier" class="label label-default">{{$grade->designation}}</a>@endif
                             </p>

                         </div>
                         <!-- /.box-body -->
                     </div>

           <div class="box box-primary">

                         <div class="box-header with-border">
                             <h3 class="box-title">الدرجة الحالية</h3>
                             <div class="box-tools pull-right">
                                 <button type="button"  class="btn btn-box-tool dropdown-toggle">
                                     <a title="تعديل الدرجات" href="/administration/titularisations/{{$user->id}}"><i class="fa fa-wrench"></i></a> </button>
                                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                 </button>
                             </div>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <p>
                                 @if($titularisation)<a  href="/administration/titularisations/{{$titularisation->id}}/modifier" class="label label-default"> قسم فرعي رقم {{$titularisation->note}} </a>@endif
                             </p>

                         </div>
                         <!-- /.box-body -->
                     </div>


           <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

    </section>

@endsection

@section('footer')
<script src="{{ asset ("/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
      $('#datepicker1').datepicker({
          autoclose: true
      });
      $('#datepicker2').datepicker({
          autoclose: true
      });
      $('#datepicker3').datepicker({
          autoclose: true
      });
      $('#datepicker4').datepicker({
          autoclose: true
      });
      $('#datepicker5').datepicker({
          autoclose: true
      });
  });
</script>

@endsection