@extends('enseignant.layouts.layout')



@section('title')
    حساب الأستاذ  {{ Auth::user()->nom }}
@endsection

@section('header')
    {!! Html::style('/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css')!!}


@endsection

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">المعلومات الشخصية</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body" style="font-size: larger">

                        <div class="row">


                            <div class="col-xs-12">
                                <div class="col-xs-12">

                                <b>رقم الضمان الاجتماعي :</b>
                                    {{ Auth::user()->sec_s }}
                                    </div>
                                <br/>
                            </div>


                            <div class="col-xs-6">
                                <div class="col-md-12">
                                <b>اللقب و الاسم باللاتينية:</b>
                                    {{ Auth::user()->nom_fr }} {{ Auth::user()->prenom_fr }}
                                </div>
                                <div class="col-md-12">
                                <b>البريد الالكتروني :</b>
                                {{ Auth::user()->email }}
                                </div>
                                <div class="col-md-12">
                                <b>عدد الأطفال :</b>
                                {{ Auth::user()->nbr_enf }}
                                </div>
                                <div class="col-xs-12">
                                    <b>تاريخ و مكان الميلاد:</b>

                                    {{ Auth::user()->date_n }}  {{ Auth::user()->lieu_n }}
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="col-md-12">
                                    <b>الاسم و اللقب:</b>
                                    {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
                                </div>
                                <div class="col-md-12">
                                    <b>رقم الهاتف :</b>
                                    {{ Auth::user()->telephone }}
                                </div>
                                <div class="col-md-12">
                                    <b>الحالة الاجتماعية :</b>

                                    {{ Auth::user()->situation_f }}
                                </div>

                                <div class="col-xs-12">
                                    <b>الجنس :</b>

                                    {{ Auth::user()->sexe }}
                                </div>

                            </div>



                            <div class="col-xs-12">

                                <div class="col-xs-12">

                                <b>العنوان :</b>

                                {{ Auth::user()->adresse }}
                                    <br/> </div>
                            </div>

                        </div>

                        </div>


            </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">القرارات</h3>

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
                                <th>رقم القرار</th>
                                <th>الموضوع</th>
                                <th>التحكم</th>
                            </tr>
                            </thead>
                            <tbody>




                            </tbody>

                            <tfoot>
                            <tr>
                                <th>رقم القرار</th>
                                <th>الموضوع</th>
                                <th>التحكم</th>
                            </tr>
                            </tfoot>

                        </table>
                    </div>

                    <!-- /.box-body -->
                </div>


            </div>


            <!-- /.col -->
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">الصورة الشخصية</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ url('/images/'. Auth::user()->photo  .'/') }}"  alt="User profile picture">
                        <h3 class="profile-username text-center">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h3>
                        <p class="text-muted text-center">{{$grade->designation}}</p>
                        @if(Auth::user()->fonction)
                            <p class="text-muted text-center"> المنصب العالي المشغول :
                                {{ Auth::user()->fonction }}</p>
                        @endif


                    </div>


                </div>
                <!-- /.box -->


                <!-- About Me Box -->
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">الشهادات</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>
                            @foreach($diplom as $diplom)
                                <span  class="label label-success">{{$diplom->nom_Dip}}</span>
                            @endforeach
                        </p>

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
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
            if($(this).index()  < 2 ){
                var classname = $(this).index() == 2  ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" '+title+'" />' );
            }
        } );

        var table = $('#data').DataTable({
            "processing": true,
            ajax: '{{ url('/enseignant/data') }}',
            columns: [
                {data: 'numero', name: 'decision.numero'},
                {data: 'sujet', name: 'decision.sujet'},
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
            iDisplayLength: 5,
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