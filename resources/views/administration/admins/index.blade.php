@extends('administration.layouts.layout')

@section('title')
الاداريين
@endsection

@section('header')
<!--{!! Html::style('/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css')!!}-->

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->


@endsection

@section('content')

<section class="content-header">
     <h1>
       الاداريين
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li class="active"><a href="{{ url('/administration/admins') }}">حسابات الاداريين</a></li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">
         <div class="box">
           <!-- /.box-header -->
           <div class="box-body">
             <table id="data" class="table table-bordered table-hover">
               <thead>
               <tr>
                 <th>#</th>
                 <th>الاسم</th>
                 <th>اللقب</th>
                 <th>البريد الالكتروني</th>
                 <th>رقم الهاتف</th>
                 <th>الجنس</th>
                 <th>التحكم</th>


                   </tr>
               </thead>
              <tbody>

                

                  

               </tbody>
              
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>

@endsection

@section('footer')

{!! Html::script('/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js')!!}
{!! Html::script('/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js')!!}

<script type="text/javascript">
        var lastIdx = null;

        $('#data thead th').each( function () {
            if($(this).index()  < 5 ){
                var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" '+title+'" />' );
            }else if($(this).index() == 5){
                $(this).html( '<select><option value="h"> ذكر </option><option value="f"> أنثى </option></select>' );
            }

        } );

        var table = $('#data').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{{ url('/administration/admins/data') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nom', name: 'nom'},
                {data: 'prenom', name: 'prenom'},
                {data: 'email', name: 'email'},
                {data: 'telephone', name: 'telephone'},
                {data: 'sexe', name: 'sexe'},
                {data: 'action', name: 'action',orderable: false, searchable: false}
            ],
            "language": {
                "url": "{{ Request::root()  }}/datatables/Arabic.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [

                    {
                        "sExtends": "csv",
                        "sButtonText": "ملف اكسل",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "نسخ المعلومات",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "طباعة",
                        "mColumns": "visible",


                    },
                ],

                "sSwfPath": "{{ Request::root()  }}/datatables/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
            });




        });



        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        $('#data tbody')
                .on( 'mouseover', 'td', function () {
                    var colIdx = table.cell(this).index().column;

                    if ( colIdx !== lastIdx ) {
                        $( table.cells().nodes() ).removeClass( 'highlight' );
                        $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                    }
                } )
                .on( 'mouseleave', function () {
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                } );




    </script>

@endsection
