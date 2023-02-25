 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-2">
    <!-- Brand Logo -->
    <a class="brand-link">
        <img src="/images/logo-kecil.png" alt="FIS Logo" class="rounded-pill brand-image elevaion-3" style="opacity: .8" width="100px"> |  <span class="brand-text font-weight-light"><b>E-Raport</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/'.Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h8 class="text-white">{{ Auth::user()->name }}</h8>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar" data-widget="treeview" role="menu" data-accordion="false" id="ul">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
            <a href="{{ route('home') }}"  class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
            </li>
    @if (auth()->user()->role == 'Admin')

          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa fa-database"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('siswa') }}" class="nav-link">
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kelas') }}" class="nav-link">
                  <i class="fa fa-building nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru') }}" class="nav-link">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>Data Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mapel') }}" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Data Kd Mapel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tahunajar') }}" class="nav-link">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>Semester & Thn Ajaran</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-windows"></i>
              <p>
                Form Penilaian
              <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('mid') }}" class="nav-link">
                <i class="fa fa-circle nav-icon"></i>
                <p>Nilai Mid Semester</p>
              </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('semester') }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Nilai Semester</p>
                </a>
              </li>
            </ul>
    @endif
    @if (auth()->user()->role == 'Guru')
            <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-windows"></i>
              <p>
                Penilaian Mid
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('siswa') }}" class="nav-link">
                  <i class="fa fa-database nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mid') }}" class="nav-link">
                  <i class="fa fa-line-chart nav-icon"></i>
                  <p>Nilai Mid</p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-windows"></i>
              <p>
                Penilaian Semester
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pengetahuan') }}" class="nav-link">
                  <i class="fa fa-lightbulb-o nav-icon"></i>
                  <p>Pengetahuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sikap') }}" class="nav-link">
                  <i class="fa fa-briefcase nav-icon"></i>
                  <p>Keterampilan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sikap') }}" class="nav-link">
                  <i class="fa fa-bar-chart nav-icon"></i>
                  <p>Sikap dan Absensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('semester') }}" class="nav-link">
                  <i class="fa fa-leanpub nav-icon"></i>
                  <p>Raport Semester</p>
                </a>
              </li>
            </ul>
            </li>
    @endif
    @if (auth()->user()->role == 'Siswa')
            <li class="nav-item">
                <a href="{{ route('ranking') }}" class="nav-link">
                  <i class="fa fa-database nav-icon"></i>
                  <p>Check Ranking</p>
                </a>
            </li>
    @endif
            <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link ">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Logout
              </p>
            </a>
            </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
