@extends('administration.layouts.layout')

@section('title')
ادارة الدرجات
@endsection

@section('header')
{!! Html::style('/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css')!!}


@endsection

@section('content')

<section class="content-header">
     <h1>
         الدرجات
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
         <li class="active"><a href="{{ url('/administration/titularisations/'. $user->id .'/') }}">تعديل درجات الأستاذ</a></li>

     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
   
     <div class="row">
       <div class="col-xs-12 ">
         <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">قائمة درجات الاستاذ     {{$user->nom }} {{ $user->prenom}} </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
           <!-- /.box-header -->
           <div class="box-body">
              
             <table id="data" class="table table-bordered table-hover" cellspacing="0">
               <thead>
               <tr>
                   <th>#</th>
                   <th>الدرجة</th>
                   <th>تاريخ الدرجة</th>
                   <th>التحكم</th>
               </tr>
               </thead>
              <tbody>


                  

               </tbody>

              <tfoot>
               <tr>
                   <th>#</th>
                   <th>الدرجة</th>
                   <th>تاريخ الدرجة</th>
                   <th>التحكم</th>

                   </tr>
               </tfoot>
              
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
        if($(this).index()  < 3 ){
            var classname = $(this).index() == 5  ?  'date' : 'dateslash';
            var title = $(this).html();
            $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" '+title+'" />' );
        }
    } );
    var table = $('#data').DataTable({
        "processing": true,
        ajax: '{{ url("/administration/titularisations/data/"." $user->id") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'note', name: 'note'},
            {data: 'Date', name: 'Date'},
            {data: 'action', name: 'action',orderable: false, searchable: false}
        ],
        "language": {
            "url": "{{ Request::root()  }}/datatables/Arabic.json"
        },
        "searching": true,
        "autoWidth": false,
        "lengthChange": false,
        "stateSave": true,
        "responsive": true,
        "order": [[0, 'desc']],
        iDisplayLength: 10,
        fixedHeader: true,
        initComplete: function ()
        {
            var r = $('#data thead tr');
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
