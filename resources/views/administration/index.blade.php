@extends('administration.layouts.layout')


@section('title')
لوحة التحكم
@endsection

@section('header')


@endsection

@section('content')

    <section class="content-header">
        <h1>
            رئيسية لوحة التحكم
        </h1>
    </section>
    <section class="content">

        <div class="row">

            <div class="col-md-6">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> احصائيات الأساتذة حسب الجنس</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-xs-12 ">
                            <canvas id="sexe"  height="130" width="257" style="width: 257px; height: 130px;"></canvas>

                        </div>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                </div>



            </div>

            <div class="col-md-6 ">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">قائمة الأساتذة</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">

                        @foreach(enseignant_list() as $enseignant)

                            <li><!-- start notification -->
                                <img src="{{ url('/images/'. $enseignant->photo .'/') }}" alt="User Image" class="profile-user-img img-responsive img-circle">
                                <a class="users-list-name" href="{{ url('/administration/enseignants/'. $enseignant->id . '/modifier') }}">
                                    {{$enseignant->prenom}} {{$enseignant->nom}}</a>
                            </li><!-- end notification -->
                        @endforeach
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{ url('/administration/enseignants/') }}" class="uppercase">عرض الجميع</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>


            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">احصائيات الأساتذة حسب التخصص</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="spec" style="height: 230px; width: 627px;" height="230" width="627"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>




        </div>
    </section>


@endsection

@section('footer')

    <!-- ChartJS 1.0.1 -->
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js')!!}

    <script type="text/javascript">

        new Chart(document.getElementById("sexe"),{"type":"doughnut","data":{"labels":["أنثى","ذكر"],"datasets":[{"label":"My First Dataset","data":[{{count_sexe("أنثى")}},{{count_sexe("ذكر")}}],"backgroundColor":["rgb(255, 99, 132)","#3c8dbc"]}]}});

        new Chart(document.getElementById("spec"),{"type":"bar","data":{"labels":["اعلام الي","الكترونيك","رياضيات","فيزياء","لغة انجليزية","لغة فرنسية"],
            "datasets":[{"label":"عدد الأساتذة","data":[{{count_spec("اعلام الي")}},{{count_spec("الكترونيك")}},{{count_spec("رياضيات")}},{{count_spec("فيزياء")}},{{count_spec("لغة انجليزية")}},{{count_spec("لغة فرنسية")}}],
                "fill":false,"backgroundColor":["#00a65a","#00a65a","#00a65a","#00a65a","#00a65a","#00a65a"]}]},"options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}});
    </script>




@endsection
