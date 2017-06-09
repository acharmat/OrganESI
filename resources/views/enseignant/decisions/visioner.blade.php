@extends('enseignant.layouts.layout')

@section('title')
القرار رقم {{ $decision->id }}

@endsection

@section('header')


@endsection

@section('content')
    <section class="content" style="width: 80%">

    <div class="box box-solid">
        <div class="box-header with-border no-print">
            <i class="fa fa-file-text"></i>

            <h3 class="box-title ">القرار</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="decision">
                <!-- /.col -->

                <div class="col-xs-12" style="text-align:center">
                        <h2> الموضوع :
                            {{ $decision->sujet }}  </h2></br></br>
                </div>
                <!-- /.col -->


                <div class="col-xs-12" style="text-align:center">
                    <p>{{ $decision->contenu }}  </p>
                </div>
                <!-- /.col -->



        </div>
        <!-- /.box-body -->
    </div>
    </section>

@endsection

@section('footer')



@endsection