@extends('administration.layouts.layout')

@section('title')
    تعديل الرتبة
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
    <section class="content-header">
        <h1>تعديل رتبة الاستاذ {{$user->nom}} {{$user->prenom}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/grades/'. $grade->id .'modifier') }}">تعديل الرتبة</a></li>
        </ol>
    </section>
<br>
    <section class="content">


        <div class="row">
            <div class="col-xs-12 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">معلومات الرتبة</h3>


                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- form start -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/grades/update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $grade->id }}" name="id">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="datepicker" class="control-label">تاريخ الرتبة</label>
                                            <input type="text" id="datepicker" class="form-control" name="Date_grad" value="{{ $grade->Date_grad }}" >
                                        </div>
                                    </div>

                                </div>


                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="designation" class="control-label">الرتبة</label>
                                            {{ Form::select(
                                             'designation',
                                                    array('أستاذ مساعد قسم ب' => 'أستاذ مساعد قسم ب','أستاذ مساعد قسم أ' => 'أستاذ مساعد قسم أ','أستاذ محاضر قسم ب' => 'أستاذ محاضر قسم ب','أستاذ محاضر قسم أ' => 'أستاذ محاضر قسم أ','بروفيسور' => 'بروفيسور'),
                                             $grade->designation,
                                             [
                                                   'class' => 'form-control'
                                             ]
                                             ) }}

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-left">تعديل الرتبة</button>
                        </div>
                    </form>
                </div></div></div>
        <!-- /.row -->
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