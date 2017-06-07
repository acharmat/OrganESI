@extends('administration.layouts.layout')

@section('title')
    اضافة عطلة
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
<section class="content-header">
     <h1>
       اضافة قرار
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li><a href="{{ url('/administration/admins') }}">الاداريين</a></li>
       <li class="active"><a href="{{ url('/administration/decisions/ajouter') }}">أضف قرار</a></li>
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

        <form class="form-horizontal" role="form" method="POST" action="{{ url('administration/decisions') }}" enctype="multipart/form-data">
                                              {{ csrf_field() }}

            <div class="box-body">



                <div class="col-xs-12">
                    <div class="row">

                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="sujet" class="control-label">موضوع القرار</label>
                                    <input id="sujet" type="text" class="form-control" name="sujet" value="{{ old('sujet') }}" autofocus>
                                    @if ($errors->has('sujet'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sujet') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="numero" class="control-label">رقم القرار</label>
                                    <input id="nom" type="text" class="form-control" name="numero" value="{{ old('numero') }}" autofocus>
                                    @if ($errors->has('numero'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                        </div>


                        <div class="col-xs-12">

                            <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="contenu" class="control-label">محتوي القرار</label>
                                    <textarea id="contenu" name="contenu" class="form-control" rows="15" value="{{ old('contenu') }}"  autofocus></textarea>
                                    @if ($errors->has('contenu'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contenu') }}</strong>
                                    </span>
                                    @endif
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


@endsection