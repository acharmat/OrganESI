<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">

      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
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
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('enseignant/logout') }}" class="btn btn-default btn-flat"
                     onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    تسجيل الخروج
                  </a>

                  <form id="logout-form" action="{{ url('enseignant/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
                <div class="pull-right">
                  <a href="/enseignant/compte" class="btn btn-default btn-flat">بياناتي</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

      <div class="navbar-header pull-right">
        <a href="/enseignant" class="navbar-brand"><b>Organ</b>ESI</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>


      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >الخدمات  <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu" style="text-align: right">
              <li><a href="/enseignant/conge">ادارة الاجازات</a></li>
            </ul>
          </li>
        </ul>
      </div>



      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
