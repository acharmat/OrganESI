@extends('administration.layouts.layout')

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
        <div class="box-footer no-print">
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-default pull-left" id="print"><i class="fa fa-print"></i> طباعة</button>
                </div>
        </div>
        </div>
    </div>
    </section>

@endsection

@section('footer')

    <script type="text/javascript">
        (function() {

            function createPopup( data ) {
                var num = "{{ $decision->numero }}";
                var year = "{{ date('Y') }}";
                var mywindow = window.open( "", "new div", "height=400,width=600" );
                mywindow.document.write( "<html><head><style>@page { size: auto;  margin: 0 20px 0 20px ; }</style></head><body >" );
                mywindow.document.write( "<h1 style='text-align: center'> الجمهورية الجزائرية الديموقراطية الشعبية</h1>" );
                mywindow.document.write( "<h2 style='text-align: center'> وزارة التعليم العالي و البحث العلمي</h2>" );
                mywindow.document.write( "<h4 style='text-align: right'> المدرسة العليا للاعلام الالي - 08 ماي 1945 - سيدي بلعباس" +
                    "<br/>المديرية - الأمانة العامة" +
                    "<br/>مديرية المستخدمين والتكوين والنشاطات الثقافية والرياضية" +
                    "<br/>مصلحة المستخدمين المدرسين" +
                    "<br/>قرار رقم : " + year+"/"+num+
                    "</h4>" );
                mywindow.document.write( "<br/>" );
                mywindow.document.write( "<br/>" );

                mywindow.document.write("<div style='text-align: right; font-size: 18px'>");
                mywindow.document.write( data);
                mywindow.document.write( "</div>" );
                mywindow.document.write( "<br/>" );
                mywindow.document.write( "<br/>" );
                mywindow.document.write( "<h4 style='text-align: center'>  سيدي بلعباس في </h4>");
                mywindow.document.write( "<br/>" );
                mywindow.document.write( "<br/>" );
                mywindow.document.write( "<h4 style='text-align: left; margin-left: 30px'>المدير </h4>" );
                mywindow.document.write( "</body></html>" );

                mywindow.print();
                mywindow.close();

                return true;

            }
            document.addEventListener( "DOMContentLoaded", function() {
                document.getElementById( "print" ).addEventListener( "click", function() {
                    createPopup( document.getElementById( "decision" ).innerHTML );

                }, false );

            });

        })();

    </script>


@endsection