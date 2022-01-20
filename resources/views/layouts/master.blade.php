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
  <link rel="stylesheet" href="../../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/components.css">
  <link rel="icon" type="image/png" href="../../assets/img/logo.png" />
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @yield('navbar')
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img src="../../assets/img/logo.png" class="mr-1" alt="Logo" width="30px" height="30px">
              Program Cuti</a>
          </div>
          <!-- Ubah logo FAN -->
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"> <img src="../../assets/img/logo.png" alt="Logo" width="30px" height="30px">
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
<<<<<<< HEAD
            <li class="nav-item dropdown {{ request()->is('dashboard') ? 'active' : '' }}">
              <a href="/dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data Cuti</li>
            <li class="nav-item {{ request()->is('data/cuti*') ? 'active' : '' }}">
              <a href="/data/cuti" class="nav-link"><i class="fas fa-columns"></i> <span>Data Cuti</span></a>
            </li>
            <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Kalender</span></a></li>
            <li class="menu-header">Admin Control</li>
            <li class="nav-item dropdown {{ request()->is('admin') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Control Admin</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Data Karyawan</a></li>
                <li class="{{ request()->is('admin') ? 'active' : '' }}"><a class="nav-link" href="admin">Data Akun</a></li>
              </ul>
            </li>
            @if(!auth()->user()->is_admin && auth()->user()->posisi !== 'karyawan')
            <li class="menu-header">Data Approval</li>
            <li class="nav-item {{ request()->is('data/approval*') ? 'active' : '' }}">
              <a href="/data/approval" class="nav-link"><i class="fas fa-columns"></i> <span>Data Approval</span></a>
            <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Kalender</span></a></li>
            </li>
            @endif
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> About
              </a>
            </div>
          </ul>
=======
            <li class="nav-item dropdown active">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Histori Cuti</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Bulan</a></li>
                <li class="active"><a class="nav-link" href="#">Tahun</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="/cuti" class="nav-link"><i class="fas fa-fire"></i><span>Data Cuti</span></a>
            </li>
            <li class="menu-header">Administrator</li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-columns"></i> <span>Permohonan Cuti</span></a>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Kalender Cuti</span></a></li>
>>>>>>> 0096b1867d32b39fa843c5bf6fcb70f65afed417
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
  <script src="../../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="../../assets/js/scripts.js"></script>
  <script src="../../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../../assets/js/page/index.js"></script>
</body>

</html>