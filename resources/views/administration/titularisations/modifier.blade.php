@extends('administration.layouts.layout')

@section('title')
    تعديل درجة
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
    <section class="content-header">
        <h1>تعديل درجة الاستاذ {{$user->nom}} {{$user->prenom}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/titularisations/'. $titularisation->id .'modifier') }}">تعديل الدرجة</a></li>
        </ol>
    </section>
<br>
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">معلومات الدرجة</h3>


                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/titularisations/update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $titularisation->id }}" name="id">
                        <div class="box-body">
                            <div class="row">

                                <div class="col-xs-6">

                                    <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label for="datepicker" class="control-label">تاريخ الدرجة</label>
                                            <input type="text" id="datepicker" class="form-control" name="Date" value="{{ $titularisation->Date }}" >
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xs-6">
                                    <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label for="note" class="control-label">اسم الدرجة</label>
                                                {{ Form::select(
                                                 'note',
                                                        array('1' => 'قسم فرعي 1','2' => 'قسم فرعي 2',
                                                        '3' => 'قسم فرعي 3','4' => 'قسم فرعي 4',
                                                        '5' => 'قسم فرعي 5','6' => 'قسم فرعي 6',
                                                        '7' => 'قسم فرعي 7','8' => 'قسم فرعي 8',
                                                        '9' => 'قسم فرعي 9','10' => 'قسم فرعي 10',
                                                        '11' => 'قسم فرعي 11','12' => 'قسم فرعي 12'),
                                                 $titularisation->note,
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
                            <button type="submit" class="btn btn-primary pull-left">تعديل الدرجة</button>
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

        });
    </script>

@endsection