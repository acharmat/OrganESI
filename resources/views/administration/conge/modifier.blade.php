@extends('administration.layouts.layout')

@section('title')
تعديل اجازة
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
<section class="content-header">
     <h1>تعديل اجازة الأستاذ {{$user->nom}} {{$user->prenom}}

     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li><a href="{{ url('/administration/conge') }}">ادارة الاجازات</a></li>
       <li class="active"><a href="{{ url('/conge/'. $conge->id .'modifier') }}">تعديل الاجازة</a></li>
     </ol>
   </section>

       <section class="content">

      <div class="row">
        <div class="col-md-12">
         <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">معلومات الاجازة</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- form start -->
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/conge/update') }}">
               {{ csrf_field() }}
            <input type="hidden" value="{{ $conge->id }}" name="id">
              
              
      <div class="box-body">

        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group{{ $errors->has('date_f') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="datepicker2" class="control-label">تاريخ نهاية العطلة</label>
                            <input type="text" id="datepicker2" class="form-control" name="date_f" value="{{$conge->Date_fin}}" >
                        </div></div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="decision" class="control-label">الحالة</label>
                            {{ Form::select(
                                'decision',
                                array('مقبول'=>'مقبول' , 'مرفوض'=>'مرفوض'),
                                $conge->decision,
                                [
                                    'class' => 'form-control'
                                ]
                            ) }}
                        </div>
                    </div>



                </div>
                <div class="col-xs-6">

                    <div class="form-group{{ $errors->has('date_d') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="datepicker" class="control-label">تاريخ بداية العطلة</label>
                            <input type="text" id="datepicker" class="form-control" name="date_d" value="{{ $conge->Date_debut}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="type" class="control-label">نوع العطلة</label>
                            {{ Form::select(
                                'type',
                                array('مرضية' =>'مرضية' , 'أمومة' =>'أمومة', 'مدة طويلة' =>'مدة طويلة', 'علمية' =>'علمية'),
                                $conge->Type,
                                [
                                    'class' => 'form-control'
                                ]
                            ) }}
                        </div>
                    </div>


                </div>


            </div></div></div>

               <!-- /.box-body -->
               <div class="box-footer">
                   <button type="submit" class="btn btn-primary pull-left">حفظ التعديلات</button>
               </div>
           </form>
         </div></div></div>
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
      $('#datepicker2').datepicker({
          autoclose: true
      });

  });
</script>

@endsection