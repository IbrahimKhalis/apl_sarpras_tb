{{-- <nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>

  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
          <i class="align-middle" data-feather="settings"></i>
        </a>

        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
          <img src="{{ Auth::user()->profil != '/img/profil.png' ? asset('storage/' . Auth::user()->profil) : asset('/img/profil.png') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
          <span class="text-dark">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="{{ route('profil.index') }}"><i class="align-middle me-1" data-feather="user"></i>
            Profile</a>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="post" class="logout">
            @csrf
            <button class="dropdown-item text-danger" tabindex="-1" type="submit"
              style="border: none; background: none; color: grey;">
              <i class="ti-power-off text-primary"></i>
              <i class="align-middle me-1" data-feather="log-out"></i> Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav> --}}

 <!-- BEGIN: Top Bar -->
 <div class="top-bar">
  <!-- BEGIN: Breadcrumb -->
  <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
  </nav>
  <!-- END: Breadcrumb -->
  <!-- BEGIN: Account Menu -->
  <div class="intro-x dropdown w-8 h-8">
      <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
          <img alt="Midone - HTML Admin Template" src="{{ Auth::user()->profil != '/img/profil.png' ? asset('storage/' . Auth::user()->profil) : asset('/img/profil.png') }}">
      </div>
      <div class="dropdown-menu w-56">
          <ul class="dropdown-content bg-primary text-white">
              <li class="p-2">
                  <div class="font-medium">{{ Auth::user()->name }}</div>
                  <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Frontend Engineer</div>
              </li>
              <li>
                  <hr class="dropdown-divider border-white/[0.08]">
              </li>
              <li>
                  <a href="{{ route('profil.index') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
              </li>
              <li>
                  <a href="{{ route('profil.ubah-password') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
              </li>
              <li>
                  <hr class="dropdown-divider border-white/[0.08]">
              </li>
              <li>
                <form action="/logout" method="post" class="dropdown-item hover:bg-white/5">
                  @csrf
                  <button class="dropdown-item" tabindex="-1" type="submit" style="background-color:transparent">
                    <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                  </button>
                </form>
              </li>
          </ul>
      </div>
  </div>
  <!-- END: Account Menu -->
</div>