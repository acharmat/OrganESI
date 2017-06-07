@extends('enseignant.layouts.layout')

@section('title')
    طلب عطلة
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
              <h3 class="box-title">طلب اجازة </h3>
            </div>
            <!-- form start -->

        <form class="form-horizontal" role="form" method="POST" action="{{ url('enseignant/conge') }}" enctype="multipart/form-data">
                                              {{ csrf_field() }}

            <div class="box-body">



                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="type" class="control-label">نوع العطلة</label>
                                    <select class="form-control" name="type">
                                        <option value="مرضية">مرضية</option>
                                        <option value="مدة طويلة"> مدة طويلة</option>
                                        <option value="أمومة">أمومة</option>
                                        <option value="علمية">علمية</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group{{ $errors->has('date_f') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="datepicker" class="control-label">تاريخ نهاية العطلة</label>
                                    <input type="text" id="datepickerf" class="form-control" name="date_f" value="{{ old('date_f') }}" >
                                    @if ($errors->has('date_f'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date_f') }}</strong>
                                    </span>
                                    @endif
                                </div></div>
                        </div>
                        <div class="col-xs-4">


                            <div class="form-group{{ $errors->has('date_d') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <label for="datepicker" class="control-label">تاريخ بداية العطلة</label>
                                    <input type="text" id="datepickerd" class="form-control" name="date_d" value="{{ old('date_d') }}" >
                                    @if ($errors->has('date_d'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date_d') }}</strong>
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">قائمة الاجازات</h3>

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
                            <th>بداية الاجازة</th>
                            <th>نهاية الاجازة</th>
                            <th>نوع العطلة</th>
                            <th>الحالة</th>
                        </tr>
                        </thead>
                        <tbody>




                        </tbody>

                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>بداية الاجازة</th>
                            <th>نهاية الاجازة</th>
                            <th>نوع العطلة</th>
                            <th>الحالة</th>
                        </tr>
                        </tfoot>

                    </table>
                </div>

                <!-- /.box-body -->
            </div>

        </div>
            </div>
    
    </section>

@endsection

@section('footer')
    {!! Html::script('/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js')!!}
    {!! Html::script('/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js')!!}


    <script src="{{ asset ("/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/admin-lte/plugins/select2/select2.full.min.js") }}" type="text/javascript"></script>

<script type="text/javascript">
    var lastIdx = null;
    $('#data thead th').each( function () {
        if($(this).index()  < 3 ){
            var classname = $(this).index() == 5  ?  'date' : 'dateslash';
            var title = $(this).html();
            $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" '+title+'" />' );
        }else if($(this).index() == 3){
            $(this).html( '<select><option value="مرضية"> مرضية </option><option value="أمومة"> أمومة </option><option value="علمية"> علمية </option><option value="مدة طويلة"> مدة طويلة </option></select>' )
        }else if($(this).index() == 4){
            $(this).html( '<select><option value="مقبول"> مقبول </option><option value="مراجعة"> مراجعة </option><option value="مرفوض"> مرفوض </option></select>' )
        }
    } );
    var table = $('#data').DataTable({
        "processing": true,
        ajax: '{{ url("/enseignant/conge/data") }}',
        columns: [
            {data: 'id', name: 'conge.id'},
            {data: 'Date_debut', name: 'conge.Date_debut',orderable: false, searchable: false},
            {data: 'Date_fin', name: 'conge.Date_fin',orderable: false, searchable: false},
            {data: 'Type', name: 'conge.Type',orderable: false},
            {data: 'decision', name: 'conge.decision',orderable: false},
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


<script>
  $(function () {
    //Date picker

      $('#datepickerd').datepicker({
          autoclose: true
      });

  });

  $(function () {
      //Date picker
      $('#datepickerf').datepicker({
          autoclose: true
      });});
</script>


@endsection