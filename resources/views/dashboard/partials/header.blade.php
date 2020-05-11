<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">{{config('app.name_abbr')}}</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{{config('app.name')}}</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span>{{auth()->user()->name}}</span>
          </a>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="{{route('dashboard.logout')}}" onclick="submitLogoutForm(event)"><i class="fa fa-power-off"></i></a>
          <form id="logout-form" method="POST" action="{{ route('dashboard.logout') }}" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </nav>
</header>