@extends('enseignant.layouts.layout')

@section('title')
    تعديل الحساب
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/admin-lte/plugins/select2/select2.min.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')

       <section class="content">

      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تغيير كلمة المرور</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <!-- form start -->
                <form class="form-horizontal" role="form" method="POST" action="{{ url('enseignant/compte/changemdp') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-xs-6">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="password-confirm" class="control-label">اعادة كلمة المرور</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-6">

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="password" class="control-label">كلمة المرور</label>
                                        <input id="password" type="password" class="form-control" name="password">

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
            </div>
    
    </section>

@endsection

@section('footer')
    {!! Html::script('/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js')!!}
    {!! Html::script('/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js')!!}




@endsection