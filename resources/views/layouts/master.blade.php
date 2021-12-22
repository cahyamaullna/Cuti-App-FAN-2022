<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Fanintek</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @yield('navbar')
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img src="../assets/img/logo.png" class="mr-1" alt="Logo" width="30px" height="30px">
              Program Cuti</a>
          </div>
          <!-- Ubah logo FAN -->
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"> <img src="../assets/img/logo.png" alt="Logo" width="30px" height="30px">
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="#">Semua Data Cuti</a></li>
                <li><a class="nav-link" href="#">Proses Cuti</a></li>
                <li><a class="nav-link" href="#">Tolak Cuti</a></li>
              </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
              </ul>
            </li>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> FANINTEK | Grup 1
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
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
</body>

</html>