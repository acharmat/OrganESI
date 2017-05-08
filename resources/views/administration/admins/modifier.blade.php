@extends('administration.layouts.layout')

@section('title')
تعديل معلومات الاداري
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
<section class="content-header">
     <h1>     
     تعديل معلومات الاداري
      {{ $user->nom }}
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li><a href="{{ url('/administration/admins') }}">الاداريين</a></li>
       <li class="active"><a href="{{ url('/administration/admins/'. $user->id .'modifier') }}">تعديل معلومات الاداري</a></li>
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
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/admins/update') }}">
              {{ csrf_field() }}
            <input type="hidden" value="{{ $user->id }}" name="id">
              
              
    <div class="box-body">
        <div class="col-xs-12">
                <div class="row">
    
                <div class="col-xs-6">

                        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="nom" class="control-label">اللقب</label>
                                <input id="nom" type="text" class="form-control" name="nom" value="{{ $user->nom }}"  autofocus>
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


                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="telephone" class="control-label">رقم الهاتف</label>
                                <input id="telephone" type="text" class="form-control" name="telephone" value="{{ $user->telephone }}"  autofocus>
                                @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
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
                                <input id="nom_fr" type="text" class="form-control" name="nom_fr" value="{{ $user->nom_fr }}"  autofocus>
                                @if ($errors->has('nom_fr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom_fr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="email" class="control-label">البريد الالكتروني</label>
                                <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}"  autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

            </div>

            <div class="col-xs-12">

                        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="adresse" class="control-label">العنوان</label>
                                <input id="adresse" type="text" class="form-control" name="adresse" value="{{ $user->adresse }}"  autofocus>
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
                             <input id="lieu_n" type="lieu_n" class="form-control" name="lieu_n" value="{{ $user->lieu_n }}" >
                            </div>
                         </div>
                </div>
                
                  
                <div class="col-xs-4">

                <div class="form-group{{ $errors->has('date_n') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                    <label for="datepicker" class="control-label">تاريخ الميلاد</label>
                  <input type="text" id="datepicker" class="form-control" name="date_n" value="{{ $user->date_n }}" >
                </div>
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
              <h3 class="box-title">تغيير كلمة المرور</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- form start -->
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/admins/changemdp') }}">
              {{ csrf_field() }}
              <input type="hidden" value="{{ $user->id }}" name="id">
              <div class="box-body">
                <div class="row">
                
                <div class="col-xs-6">

                        <div class="form-group">
                            <div class="col-md-12">
                            <label for="password-confirm" class="control-label">تأكيد كلمة المرور</label>
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
              <img class="profile-user-img img-responsive img-circle" src="/images/{{ Auth::user()->photo }}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $user->nom }} {{ $user->prenom }}</h3>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/admins/changetof') }}" enctype="multipart/form-data">
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
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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

  });
</script>

@endsection