@extends('administration.layouts.layout')

@section('title')
تعديل القرار
@endsection

@section('header')
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
<section class="content-header">
     <h1>تعديل القرار
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li><a href="{{ url('/administration/decisions') }}">القرارات</a></li>
       <li class="active"><a href="{{ url('/decisions/'. $decision->id .'modifier') }}">تعديل قرار</a></li>
     </ol>
   </section>

       <section class="content">

      <div class="row">
        <div class="col-md-12">
         <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">محتوى القرار</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- form start -->
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/administration/decisions/update') }}">
              {{ csrf_field() }}
            <input type="hidden" value="{{ $decision->id }}" name="id">

               <div class="box-body">



                   <div class="col-xs-12">
                       <div class="row">

                           <div class="col-xs-6">
                               <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                                   <div class="col-md-12">
                                       <label for="sujet" class="control-label">موضوع القرار</label>
                                       <input id="sujet" type="text" class="form-control" name="sujet" value="{{ $decision->sujet }}" autofocus>
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
                                       <input id="nom" type="text" class="form-control" name="numero" value="{{ $decision->numero }}" autofocus>
                                       @if ($errors->has('numero'))
                                           <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                       @endif
                                   </div>
                               </div>



                           </div>


                           <div class="col-xs-12">

                               <div class="form-group{{ $errors->has('contenu') ? ' has-error' : '' }}">
                                   <div class="col-md-12">
                                       <label for="contenu" class="control-label">محتوي القرار</label>
                                       {{ Form::textarea(
                                                   'contenu',
                                                   $decision->contenu,
                                                   [
                                                       'rows' => 15,
                                                       'class' => 'form-control'
                                                   ]
                                               ) }}
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
                   <button type="submit" class="btn btn-primary pull-left">تعديل </button>
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