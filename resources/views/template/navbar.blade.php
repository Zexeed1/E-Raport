<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://futureislamicschoolpku.sch.id/" class="nav-link">Profile Sekolah</a>
      </li>
    </ul>

   <div class="dropdown navbar-nav ml-auto ">
  <a class="btn  btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    {{ Auth::user()->name }}
  </a>

  <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ route('updateAkun') }}"><i class="nav-icon fa fa-lock"></i> Ganti Password</a>
    <a class="dropdown-item" href="{{ route('logout') }}"><i class="nav-icon fa fa-sign-out"></i> Logout</a>
  </div>
</div>
  </nav>

  <!-- /.navbar -->
