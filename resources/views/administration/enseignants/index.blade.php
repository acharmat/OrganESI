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
       <div class="col-xs-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Hover Data Table</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <table id="example2" class="table table-bordered table-hover">
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

                  @foreach ($user as $userinfo)
                    <tr>
                    <td>{{ $userinfo->id }}</td>
                    <td>{{ $userinfo->nom }}</td>
                    <td>{{ $userinfo->prenom }}</td>
                    <td>{{ $userinfo->email }}</td>
                    <td>{{ $userinfo->telephone }}</td>
                    <td>{{ $userinfo->sexe }}</td>
                      <td>
                      <a href="{{ url('/administration/enseignants/'. $userinfo->id . '/modifier')}}"> تعديل
                      <a href="{{ url('/administration/enseignants/'. $userinfo->id . '/supprimer')}}"> حذف
                    </td>
                    @endforeach

                    </tr>

               </tbody>
               <tfoot>
               <tr>
                 <th>#</th>
                 <th>الاسم</th>
                 <th>اللقب</th>
                 <th>البريد الالكتروني</th>
                 <th>رقم الهاتف</th>
                 <th>الجنس</th>
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
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
      });
</script>

@endsection
