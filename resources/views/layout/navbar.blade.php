  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fa-solid fa-user mr-2"></i>
                  <span class="badge badge-warning navbar-badge"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-danger" href="{{route('profile')}}">
                      <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                      {{ __('Profile') }}
                  </a>
                  <a class="dropdown-item text-danger" href="{{ route('signout') }}">
                      <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                      {{ __('Logout') }}
                  </a>
              </div>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
