<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light bg-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item user-menu">
        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
          <span class="d-sm-none d-sm-inline">{{ Auth()->user()->name}} </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <li class="user-header">

            <p>
            {{ Auth()->user()->name}} - Web Developer
              <small>Member since Aug. 2020</small>
            </p>
          </li>
          <!-- Menu Body -->
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="/logout" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
      
    </ul>
</nav>
  <!-- /.navbar -->