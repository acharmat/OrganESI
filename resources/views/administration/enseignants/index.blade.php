@extends('administration.layouts.layout')

@section('title')
الأساتذة
@endsection

@section('header')
{!! Html::style('/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css')!!}


@endsection

@section('content')

<section class="content-header">
     <h1>
       الأساتذة
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('/administration') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li class="active"><a href="{{ url('/administration/enseignants') }}">حسابات الأساتذة</a></li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
   
     <div class="row">
       <div class="col-xs-12 ">
         <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">قائمة الأساتذة</h3>

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
                 <th>رقم الضمان الاجتماعي</th>
                 <th>الاسم</th>
                 <th>اللقب</th>
                 <th>البريد الالكتروني</th>
                 <th>رقم الهاتف</th>
                 <th>الجنس</th>
                   <th>الرتبة</th>

                   <th>التحكم</th>


                   </tr>
               </thead>
              <tbody>

                

                  

               </tbody>

              <tfoot>
               <tr>
                 <th>رقم الضمان الاجتماعي</th>
                 <th>الاسم</th>
                 <th>اللقب</th>
                 <th>البريد الالكتروني</th>
                 <th>رقم الهاتف</th>
                 <th>الجنس</th>
                   <th>الرتبة</th>
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
            if($(this).index()  < 5 ){
                var classname = $(this).index() == 7  ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" '+title+'" />' );
            }else if($(this).index() == 5){
                $(this).html( '<select><option value="ذكر"> ذكر </option><option value="أنثى"> أنثى </option></select>' );
            }else if($(this).index() == 6){
                $(this).html( '<select><option value="أستاذ مساعد قسم ب">أستاذ مساعد قسم ب</option><option value="أستاذ مساعد قسم أ">أستاذ مساعد قسم أ</option> <option value="أستاذ محاضر قسم ب">أستاذ محاضر قسم ب</option> <option value="أستاذ محاضر قسم أ">أستاذ محاضر قسم أ</option> <option value="بروفيسور">بروفيسور</option> </select>' );
            }
        } );
        var table = $('#data').DataTable({
        "processing": true,
            ajax: '{{ url('/administration/enseignants/data') }}',
            columns: [
                {data: 'sec_s', name: 'enseignant.sec_s'},
                {data: 'nom', name: 'enseignant.nom'},
                {data: 'prenom', name: 'enseignant.prenom'},
                {data: 'email', name: 'enseignant.email'},
                {data: 'telephone', name: 'enseignant.telephone',orderable: false},
                {data: 'sexe', name: 'enseignant.sexe',orderable: false},
                {data: 'designation', name: 'grade.designation',orderable: false},
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
