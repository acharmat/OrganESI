@extends('administration.layouts.layout')

@section('title')
أضف مدير
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
<section class="content-header">
     <h1>
       اضافة مدير جديد
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li><a href="{{ url('/administration/admins') }}">الاداريين</a></li>
       <li class="active"><a href="{{ url('/administration/admins/ajouter') }}">أضف مدير</a></li>
     </ol>
   </section>

       <section class="content">

      <div class="row">
        <div class="col-md-12">
         <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">المعلومات الشخصية</h3>
            </div>
            <!-- form start -->

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/admins') }}" enctype="multipart/form-data">
                                              {{ csrf_field() }}
  <div class="box-body">



        <div class="col-xs-12">
                <div class="row">
                                  <div class="col-xs-6">
                        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="nom" class="control-label">اللقب</label>
                                <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" autofocus>
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
                                <input id="prenom_fr" type="text" class="form-control" name="prenom_fr" value="{{ old('prenom_fr') }}"  autofocus>
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
                             <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <label for="password-confirm" class="control-label">تأكيد كلمة المرور</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>   

                </div>
                <div class="col-xs-6">

                        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="prenom" class="control-label">الاسم</label>
                                <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}"  autofocus>
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
                                <input id="nom_fr" type="text" class="form-control" name="nom_fr" value="{{ old('nom_fr') }}"  autofocus>
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
                                <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}"  autofocus>
                                @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                            <label for="password" class="control-label">كلمة المرور</label>
                             <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                   

                </div>
                <div class="col-xs-12">

                        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="adresse" class="control-label">العنوان</label>
                                <textarea id="adresse" name="adresse" class="form-control" rows="3" value="{{ old('adresse') }}"  autofocus></textarea>
                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>   
                </div>  

            <div class="col-xs-4">


                       <div class="form-group{{ $errors->has('sexe') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                            <label for="sexe" class="control-label">الجنس</label>
                              <select class="form-control" name="sexe">
                                    <option value="h">ذكر</option>
                                    <option value="f">أنثى</option>
                            </select>
                            </div>
                         </div>

                </div>  
                <div class="col-xs-4">

                       <div class="form-group{{ $errors->has('lieu_n') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                            <label for="lieu_n" class="control-label">مكان الميلاد</label>
                             <input id="lieu_n" type="lieu_n" class="form-control" name="lieu_n" value="{{ old('lieu_n') }}" >
                            </div>
                         </div>
                </div>
                
                  
                <div class="col-xs-4">

                <div class="form-group{{ $errors->has('date_n') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                    <label for="datepicker" class="control-label">تاريخ الميلاد</label>
                  <input type="text" id="datepicker" class="form-control" name="date_n" value="{{ old('date_n') }}" >
                </div>
                </div>  
          </div>  
          </div> 
    
    </div>

    </div>
        
             <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-left">اضافة أستاذ</button>
            </div>
                </form>
    </div>
        </div>
            </div>
    
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

  });
</script>


@endsection