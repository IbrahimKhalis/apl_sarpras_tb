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
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Application</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
  </nav>
  <!-- END: Breadcrumb -->
  <!-- BEGIN: Search -->
  <div class="intro-x relative mr-3 sm:mr-6">
      <div class="search hidden sm:block">
          <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
          <i data-lucide="search" class="search__icon dark:text-slate-500"></i> 
      </div>
      <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
      <div class="search-result">
          <div class="search-result__content">
              <div class="search-result__content__title">Pages</div>
              <div class="mb-5">
                  <a href="" class="flex items-center">
                      <div class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="inbox"></i> </div>
                      <div class="ml-3">Mail Settings</div>
                  </a>
                  <a href="" class="flex items-center mt-2">
                      <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="users"></i> </div>
                      <div class="ml-3">Users & Permissions</div>
                  </a>
                  <a href="" class="flex items-center mt-2">
                      <div class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="credit-card"></i> </div>
                      <div class="ml-3">Transactions Report</div>
                  </a>
              </div>
              <div class="search-result__content__title">Users</div>
              <div class="mb-5">
                  <a href="" class="flex items-center mt-2">
                      <div class="w-8 h-8 image-fit">
                          <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-9.jpg">
                      </div>
                      <div class="ml-3">al pacino</div>
                      <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">alpacino@left4code.com</div>
                  </a>
                  <a href="" class="flex items-center mt-2">
                      <div class="w-8 h-8 image-fit">
                          <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                      </div>
                      <div class="ml-3">Johnny Depp</div>
                      <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">johnnydepp@left4code.com</div>
                  </a>
                  <a href="" class="flex items-center mt-2">
                      <div class="w-8 h-8 image-fit">
                          <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-14.jpg">
                      </div>
                      <div class="ml-3">Leonardo DiCaprio</div>
                      <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">leonardodicaprio@left4code.com</div>
                  </a>
                  <a href="" class="flex items-center mt-2">
                      <div class="w-8 h-8 image-fit">
                          <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
                      </div>
                      <div class="ml-3">Angelina Jolie</div>
                      <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">angelinajolie@left4code.com</div>
                  </a>
              </div>
              <div class="search-result__content__title">Products</div>
              <a href="" class="flex items-center mt-2">
                  <div class="w-8 h-8 image-fit">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-8.jpg">
                  </div>
                  <div class="ml-3">Samsung Q90 QLED TV</div>
                  <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Electronic</div>
              </a>
              <a href="" class="flex items-center mt-2">
                  <div class="w-8 h-8 image-fit">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-12.jpg">
                  </div>
                  <div class="ml-3">Samsung Q90 QLED TV</div>
                  <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Electronic</div>
              </a>
              <a href="" class="flex items-center mt-2">
                  <div class="w-8 h-8 image-fit">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-7.jpg">
                  </div>
                  <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                  <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Smartphone &amp; Tablet</div>
              </a>
              <a href="" class="flex items-center mt-2">
                  <div class="w-8 h-8 image-fit">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-1.jpg">
                  </div>
                  <div class="ml-3">Sony A7 III</div>
                  <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Photography</div>
              </a>
          </div>
      </div>
  </div>
  <!-- END: Search -->
  <!-- BEGIN: Notifications -->
  <div class="intro-x dropdown mr-auto sm:mr-6">
      <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
      <div class="notification-content pt-2 dropdown-menu">
          <div class="notification-content__box dropdown-content">
              <div class="notification-content__title">Notifications</div>
              <div class="cursor-pointer relative flex items-center ">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-9.jpg">
                      <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                      <div class="flex items-center">
                          <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a> 
                          <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                      </div>
                      <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                  </div>
              </div>
              <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                      <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                      <div class="flex items-center">
                          <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a> 
                          <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                      </div>
                      <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                  </div>
              </div>
              <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-14.jpg">
                      <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                      <div class="flex items-center">
                          <a href="javascript:;" class="font-medium truncate mr-5">Leonardo DiCaprio</a> 
                          <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                      </div>
                      <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                  </div>
              </div>
              <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
                      <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                      <div class="flex items-center">
                          <a href="javascript:;" class="font-medium truncate mr-5">Angelina Jolie</a> 
                          <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                      </div>
                      <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                  </div>
              </div>
              <div class="cursor-pointer relative flex items-center mt-5">
                  <div class="w-12 h-12 flex-none image-fit mr-1">
                      <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                      <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                  </div>
                  <div class="ml-2 overflow-hidden">
                      <div class="flex items-center">
                          <a href="javascript:;" class="font-medium truncate mr-5">Bruce Willis</a> 
                          <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                      </div>
                      <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- END: Notifications -->
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
                  <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
              </li>
              <li>
                  <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
              </li>
              <li>
                  <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
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