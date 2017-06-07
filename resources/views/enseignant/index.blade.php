@extends('enseignant.layouts.layout')



@section('title')
    حساب الأستاذ  {{ Auth::user()->nom }}
@endsection

@section('header')


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


                    </div>


                </div>
                <!-- /.box -->


                <!-- About Me Box -->
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">الشهادات</h3>
                        <div class="box-tools pull-right">
                            <button type="button"  class="btn btn-box-tool dropdown-toggle">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>
                            @foreach($diplom as $diplom)
                                <a  class="label label-success">{{$diplom->nom_Dip}}</a>
                            @endforeach
                        </p>

                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">الرتبة الحالية</h3>
                        <div class="box-tools pull-right">
                            <button type="button"  class="btn btn-box-tool dropdown-toggle">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>
                            @if($grade)<a  class="label label-default">{{$grade->designation}}</a>@endif
                        </p>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->

    </section>

 @endsection

@section('footer')


@endsection