<div class="navbar-bg" style="height: 70px;"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    <div class="search-element">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}" data-width="250">
      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      <div class="search-backdrop"></div>
    </div>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep" aria-expanded="false"><i class="far fa-envelope"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Pesan
          <div class="float-right">
            <a href="#">Tandai sudah dibaca</a>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-message" tabindex="3" style="overflow: hidden; outline: none;">
          <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-avatar">
              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
              <div class="is-online"></div>
            </div>
            <div class="dropdown-item-desc">
              <b>Admin</b>
              <p>Selamat Datang!</p>
              <div class="time">10 Hours Ago</div>
            </div>
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
        <div id="ascrail2002" class="nicescroll-rails nicescroll-rails-vr" style="width: 9px; z-index: 1000; cursor: default; position: absolute; top: 58px; left: 341px; height: 350px; opacity: 0.3; display: none;">
          <div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 7px; height: 176px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div>
        </div>
        <div id="ascrail2002-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 9px; z-index: 1000; top: 399px; left: 0px; position: absolute; cursor: default; display: none; width: 341px; opacity: 0.3;">
          <div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 7px; width: 350px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;"></div>
        </div>
      </div>
    </li>
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Pemberitahuan
          <div class="float-right">
            <a href="#">Tandai sudah dibaca</a>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
          <a href="{{ route('profile.show') }}" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-primary text-white">
              <i class="fas fa-code"></i>
            </div>
            <div class="dropdown-item-desc">
              Ganti Password Anda Jika belum!
              <div class="time text-primary">1 Min Ago</div>
            </div>
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->nama}}</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        @if(auth()->user()->is_admin)
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a class="dropdown-item has-icon text-danger" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </form>
        @else
        <a href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="dropdown-item has-icon border-bottom border-2">
          <i class="far fa-user"></i> Profile
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a class="dropdown-item has-icon text-danger" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </form>
        @endif
      </div>
    </li>
  </ul>
</nav>