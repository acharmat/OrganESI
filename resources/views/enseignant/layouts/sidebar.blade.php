<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <!-- Optionally, you can add icons to the links -->
              

      <li><a href="{{url('administration')}}"><i class="fa  fa-home"></i><span>الرئيسية</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-user"></i><span>حسابات الاداريين</span> <i class="fa fa-angle-left pull-left"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{url('administration/admins')}}">الاداريين</a></li>
          <li><a href="{{url('administration/admins/ajouter')}}">أضف اداري</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-users"></i><span>حسابات الأساتذة</span> <i class="fa fa-angle-left pull-left"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{url('administration/enseignants')}}">الأساتذة</a></li>
          <li><a href="{{url('administration/enseignants/ajouter')}}">أضف أستاذ</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-flag"></i><span>ادارة الاجازات</span> <i class="fa fa-angle-left pull-left"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{url('administration/conge')}}">الاجازات</a></li>
          <li><a href="{{url('administration/conge/ajouter')}}">أضف اجازة</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-file-text"></i><span>ادارة القرارات</span> <i class="fa fa-angle-left pull-left"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{url('administration/decisions')}}">القرارات</a></li>
          <li><a href="{{url('administration/decisions/ajouter')}}">أضف قرار</a></li>
        </ul>
      </li>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>