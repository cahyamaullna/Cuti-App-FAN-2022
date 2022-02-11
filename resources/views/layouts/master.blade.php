<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} &mdash; Fanintek</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../../../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../../../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../../../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../../../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../../../assets/css/style.css">
  <link rel="stylesheet" href="../../../assets/css/components.css">
  <link rel="icon" type="image/png" href="../../../assets/img/logo.png" />
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @yield('navbar')
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/dashboard"> <img src="../../../assets/img/logo.png" class="mr-1" alt="Logo" width="30px" height="30px">
              Program Cuti</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard"> <img src="../../../assets/img/logo.png" alt="Logo" width="30px" height="30px">
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ request()->is('dashboard') ? 'active' : '' }}">
              <a href="/dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @can('not_admin_direktur')
            <li class="menu-header">Data Cuti</li>
            <li class="nav-item {{ request()->is('data/cuti*') ? 'active' : '' }}">
              <a href="/data/cuti" class="nav-link"><i class="fas fa-columns"></i> <span>Data Cuti</span></a>
            </li>
            <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Kalender Cuti</span></a></li>
            @endcan
            @can('admin')
            <li class="menu-header">Admin Control</li>
            <li class="nav-item dropdown {{ request()->is('admin/data-pegawai*') || request()->is('admin/jenis-cuti*') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Control Admin</span></a>
              <ul class="dropdown-menu">
                <li class="{{ request()->is('admin/data-pegawai*') ? 'active' : '' }}"><a class="nav-link" href="/admin/data-pegawai">Data Pegawai</a></li>
                <li class="{{ request()->is('admin/jenis-cuti*') ? 'active' : '' }}"><a class="nav-link" href="/admin/jenis-cuti">Jenis Cuti</a></li>
              </ul>
            </li>
            @endcan
            @can('not_admin_karyawan')
            <li class="menu-header">Data Approval</li>
            <li class="nav-item {{ request()->is('data/approval*') ? 'active' : '' }}">
              <a href="/data/approval" class="nav-link"><i class="fas fa-columns"></i> <span>Data Approval</span></a>
            <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Kalender Khusus</span></a></li>
            </li>
            @endcan
            @can('hrd')
            <li class="nav-item {{ request()->is('pengurangan-cuti') ? 'active' : '' }}">
              <a class="nav-link" href="/pengurangan-cuti"><i class="fas fa-exclamation"></i> <span>Pengurangan Cuti</span></a>
            </li>
            @endcan
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          &copy; 2022 <div class="bullet"></div> FANINTEK | Grup 1
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../../../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../../../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../../../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../../../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../../../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../../../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="../../../assets/js/scripts.js"></script>
  <script src="../../../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../../../assets/js/page/index.js"></script>

  @yield('js')
</body>

</html>