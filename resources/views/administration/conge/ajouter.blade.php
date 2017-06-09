@extends('administration.layouts.layout')

@section('title')
    اضافة اجازة
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/admin-lte/plugins/select2/select2.min.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
<section class="content-header">
     <h1>
       اضافة اجازة
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li><a href="{{ url('/administration/conge') }}">الاجازات</a></li>
       <li class="active"><a href="{{ url('/administration/conge/ajouter') }}">أضف اجازة</a></li>
     </ol>
   </section>

       <section class="content">

      <div class="row">
        <div class="col-md-12">
         <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">المعلومات </h3>
            </div>
            <!-- form start -->

        <form class="form-horizontal" role="form" method="POST" action="{{ url('administration/conge') }}" enctype="multipart/form-data">
                                              {{ csrf_field() }}

            <div class="box-body">



                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="type" class="control-label">نوع العطلة</label>
                                    <select class="form-control" name="type">
                                        <option value="مرضية">مرضية</option>
                                        <option value="مدة طويلة"> مدة طويلة</option>
                                        <option value="أمومة">أمومة</option>
                                        <option value="علمية">علمية</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('date_f') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="datepicker" class="control-label">تاريخ نهاية العطلة</label>
                                    <input type="text" id="datepickerf" class="form-control" name="date_f" value="{{ old('date_f') }}" >
                                </div></div>


                        </div>
                        <div class="col-xs-6">


                            <div class="form-group{{ $errors->has('spec') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="id_ensg" class="control-label"> الأستاذ</label>
                                    <select dir="rtl" class="form-control select2" name="id_ensg">
                                        @foreach($user as $user)
                                        <option value="{{$user->id}}">{{$user->nom}}  {{$user->prenom}} ({{$user->sec_s}})</option>
                                         @endforeach

                                    </select>                            @if ($errors->has('id_ensg'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_ensg') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date_d') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="datepicker" class="control-label">تاريخ بداية العطلة</label>
                                    <input type="text" id="datepickerd" class="form-control" name="date_d" value="{{ old('date_d') }}" >
                                </div>
                            </div>
                        </div>

                        </div>


                    </div></div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-left">اضافة </button>
            </div>

                </form>
    </div>
        </div>
            </div>
    
    </section>

@endsection

@section('footer')

<script src="{{ asset ("/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/admin-lte/plugins/select2/select2.full.min.js") }}" type="text/javascript"></script>

<script>
  $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();
      //Date picker

      $('#datepickerd').datepicker({
          autoclose: true
      });

  });

  $(function () {
      //Date picker
      $('#datepickerf').datepicker({
          autoclose: true
      });});
</script>


@endsection