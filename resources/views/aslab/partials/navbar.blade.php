<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md">
    <div class="navbar-header" data-logobg="skin6">
      <!-- This is for the sidebar toggle which is visible on mobile only -->
      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <div class="navbar-brand">
        <!-- Logo icon -->
        <a href="index.html">
          <b class="logo-icon">
            <img src="{{ asset('assets/images/icon-lengkap.png') }}" alt="homepage" class="dark-logo ml-4 mt-4"/>
          </b>
        </a>
      </div>

      <a
        class="topbartoggler d-block d-md-none waves-effect waves-light"
        href="javascript:void(0)"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
        ><i class="ti-more"></i
      ></a>
    </div>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
        <li class="nav-item d-none d-md-block">
          {{-- <a class="nav-link" href="javascript:void(0)">
            <div class="customize-input">
              <select class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                <option selected>EN</option>
                <option value="1">AB</option>
                <option value="2">AK</option>
                <option value="3">BE</option>
              </select>
            </div>
          </a> --}}
        </li>
      </ul>
      <!-- ============================================================== -->
      <!-- Right side toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav float-right">
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">{{ $user->username }}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
            <a class="dropdown-item" href="/profile/aslab"><i data-feather="user" class="svg-icon mr-2 ml-1"></i> My Profile</a>
            <a class="dropdown-item" href="/ubahpw/aslab"><i data-feather="lock" class="svg-icon mr-2 ml-1"></i> Ubah Password</a>
            <div class="dropdown-divider"></div>
            <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item"><i data-feather="power" class="svg-icon mr-2 ml-1"></i> Logout</button>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>