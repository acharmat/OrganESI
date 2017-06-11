<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="{{url('administration')}}" class="logo"><b>Organ</b>ESI</a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->


        <!-- Notifications Menu -->
        <li class="dropdown notifications-menu">
          <!-- Menu conge -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            @if(count_conge() > 0)
            <span class="label label-warning">{{count_conge()}}</span>
              @endif
          </a>

          <ul class="dropdown-menu">
            <li class="header" style="text-align: center">يوجد {{count_conge()}} اجازات لم تراجع</li>
            <li>
              <!-- Inner Menu: contains the notifications -->
              <ul class="menu" style="text-align: right">
                @foreach(unread_conge() as $conges)

                  <li><!-- start notification -->
                    <a href="/administration/conge/{{$conges->id}}/modifier">
                      <i class="fa fa-flag text-aqua"></i>  طلب اجازة من الأستاذ : {{$conges->nom}} {{$conges->prenom}}
                    </a>
                  </li><!-- end notification -->
                @endforeach
              </ul>
            </li>
          </ul>
        </li>

        <li class="dropdown notifications-menu">
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            @if(count_statu() > 0)
              <span class="label label-warning">{{count_statu()}}</span>
            @endif
          </a>

          <ul class="dropdown-menu">
            <li class="header" style="text-align: center">يوجد {{count_statu()}} تنبيهات لم تراجع</li>
            <li>
              <!-- Inner Menu: contains the notifications -->
              <ul class="menu" style="text-align: right">
                @foreach(statu() as $statu)

                  <li><!-- start notification -->
                    <a href="/administration/enseignants/{{$statu->id}}/modifier">
                      <i class="fa fa-bell text-aqua"></i>  انتهت فترة تربص الأستاذ : {{$statu->nom}} {{$statu->prenom}}
                    </a>
                  </li><!-- end notification -->
                @endforeach
              </ul>
            </li>
          </ul>
        </li>

        <!-- Tasks Menu -->
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="/images/{{ Auth::user()->photo }}" class="user-image" alt="User Image"/>
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ Auth::user()->nom }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="/images/{{ Auth::user()->photo }}" class="img-circle" alt="User Image" />
              <p>
                {{ Auth::user()->prenom }}  {{ Auth::user()->nom }}
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                  تسجيل الخروج
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>

              </div>
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">بياناتي</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>