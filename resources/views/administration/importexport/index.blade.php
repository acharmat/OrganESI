@extends('administration.layouts.layout')

@section('title')

    استيراد و تصدير

@endsection
@section('content')


    <section class="content-header">
        <h1>
            استيراد و تصدير
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/administration/importexport/') }}">استيراد و تصدير</a></li>
        </ol>
    </section>

    <section class="content">


        <div class="row">
            <div class="col-xs-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">استيراد </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/administration/importexport/importExcel') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <input  type="file" class="form-control" name="import_file">
                            </div>
                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left">استيراد</button>
                    </div>
                    </form>




                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <div class="col-xs-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">تصدير</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                       <p>تصدير قائمة الأساتذة على شكل ملف xls <a href="{{ URL::to('administration/importexport/downloadExcel/xls') }}"><button class="btn btn-success btn-flat btn-xs">تحميل</button></a></p>
                      <p> تصدير قائمة الأساتذة على شكل ملف xlsx <a href="{{ URL::to('administration/importexport/downloadExcel/xlsx') }}"><button class="btn btn-success btn-flat btn-xs">تحميل</button></a></p>



                    </div>

                    <!-- /.box-body -->
                <!-- /.box -->

            </div>

            <!-- /.col -->
        </div>


    </section>
@endsection