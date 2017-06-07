@extends('administration.layouts.layout')

@section('title')
    تعديل شهادة
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
    <section class="content-header">
        <h1>تعديل شهادة الاستاذ {{$user->nom}} {{$user->prenom}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/diplomes/'. $diplome->id .'/modifier') }}">تعديل شهادة</a></li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">معلومات الشهادة</h3>


                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/diplomes/update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $diplome->id}}" name="id">

                        <div class="box-body">
                            <div class="row">

                                <div class="col-xs-6">

                            <div class="form-group{{ $errors->has('Date_Dip') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="datepicker" class="control-label">تاريخ الشهادة</label>
                                    <input type="text" id="datepicker" class="form-control" name="Date_Dip" value="{{$diplome->Date_Dip }}" >
                                </div>
                            </div>

                        </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="nom_Dip" class="control-label">نوع الشهادة</label>

                                                {{ Form::select(
                                                    'nom_Dip',
                                                    array('بكالوريا' => 'بكالوريا', 'ليسانس' => 'ليسانس','مهندس' => 'مهندس','ماستر' => 'ماستر', 'دكتوراه' => 'دكتوراه'),
                                                    $diplome->nom_Dip,
                                                    [
                                                        'class' => 'form-control'
                                                    ]
                                                ) }}

                                        </div>
                                    </div>


                        </div>

                                <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="division" class="control-label">التخصص</label>
                                        {{ Form::select(
                                            'division',
                                            array('اعلام الي' => 'اعلام الي', 'الكترونيك' => 'الكترونيك','رياضيات' => 'رياضيات','فيزياء' => 'فيزياء',
                                             'لغة انجليزية' => 'لغة انجليزية', 'لغة فرنسية' => 'لغة فرنسية'),
                                            $diplome->division,
                                            [
                                                'class' => 'form-control'
                                            ]
                                        ) }}

                                    </div>
                                </div>
                                </div>

                                <div class="col-xs-6">

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="spec" class="control-label">الشعبة</label>
                                            {{ Form::select(
                                                 'spec',
                                                 array('رياضيات و اعلام الي' => 'رياضيات و اعلام الي', 'الكترونيك' => 'الكترونيك','رياضيات' => 'رياضيات','فيزياء' => 'فيزياء',
                                                  'لغات' => 'لغات'),
                                                 $diplome->spec,
                                                 [
                                                     'class' => 'form-control'
                                                 ]
                                             ) }}

                                        </div>
                                    </div>
                                </div>


                            </div>

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

        });
    </script>

@endsection