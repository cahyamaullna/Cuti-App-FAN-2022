<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <link rel="icon" type="image/png" href="../assets/img/logo.png" />
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 order-2 bg-white" style="height: 616px;">
          <div class="p-4 m-3">
            <div class="d-flex mb-3">
              <img src="../assets/img/logo.png" alt="logo" width="40">
              <h4 class="text-dark font-weight-bold ml-3 mt-3">Program Cuti</h4>
            </div>
            <p class="text-muted">Sebelum mulai, anda harus masuk atau daftar jika belum mempunyai akun</p>

            <form method="POST" action="{{ route('login')}}" class="needs-validation" novalidate="">
              @csrf
              <div class="form-group">
                <label for="email" value="{{ __('Email') }}">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Masukkan email
                </div>
              </div>

              <div class="form-group mt-n1">
                <div class="d-block">
                  <label for="password" class="control-label" value="{{ __('Password') }}">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required autocomplete="current-password">
                <div class="invalid-feedback">
                  Masukkan password
                </div>
              </div>

              <div class="form-group mt-n2">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Ingat saya</label>
                </div>
              </div>

              <div class="form-group text-right mt-n3">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="float-left mt-3">
                  Lupa Password?
                </a>
                @endif
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  {{ __('Masuk') }}
                </button>
              </div>

              <div class="mt-5 text-center mt-n2">
                Tidak mempunyai akun?
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Buat akun</a>
                @endif
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              &copy; 2022 PT FAN Integrasi Teknologi | Grup 1
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/wallpaper.jpg">
          <div class="absolute-bottom-left index-2">

            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Selamat Datang</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bekasi, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://1.bp.blogspot.com/-Rr76B01JCp8/X0xxNVtdC2I/AAAAAAAAAY8/N2_2o3iOAaUZ0u_S8KjSQHcm8jyMCYW9QCLcBGAsYHQ/s2048/2.%2BGedung%2B2.jpg">PT FAN Integrasi Teknologi</a> on <a class="text-light bb" target="_blank" href="https://fanintek.com/">fanintek.com</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>