{{-- <nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="{{ route('dashboard') }}">
      <span class="align-middle">Schoolio</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <x-ButtonCustom class="sidebar-link btn-sidebar-self" route="{{ route('dashboard') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </x-ButtonCustom>
      </li>

      @can('view_sekolah')
      <li class="sidebar-item {{ Request::is('sekolah*') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('sekolah.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Sekolah</span>
        </a>
      </li>
      @endcan

      @can('view_pembayaran')
      <li class="sidebar-item {{ Request::is('pembayaran*') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('pembayaran.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Pembayaran</span>
        </a>
      </li>
      @endcan

      @if (auth()->user()->can('view_tahun_ajaran') || auth()->user()->can('view_agama') || auth()->user()->can('view_kelas'))
      <li class="sidebar-header">
        Data Master
      </li>
      @can('view_tahun_ajaran')
      <li class="sidebar-item {{ Request::is('data-master/tahun-ajaran*') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('tahun-ajaran.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Tahun Ajaran</span>
        </a>
      </li>
      @endcan
      @can('view_agama')
      <li class="sidebar-item {{ Request::is('data-master/agama*') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('agama.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Agama</span>
        </a>
      </li>
      @endcan
      @can('view_kelas')
      <li class="sidebar-item {{ Request::is('data-master/kelas*') ? 'active' : '' }}">
        <x-ButtonCustom class="sidebar-link btn-sidebar-self" route="{{ route('kelas.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Kelas</span>
        </x-ButtonCustom>
      </li>
      @endcan
      @endif

      @can('view_users')
      <li class="sidebar-header">
        Data User
      </li>
      @foreach ($roles as $role)
      @if ($role->name != 'admin' && $role->name != 'super_admin')
        <li class="sidebar-item {{ Request::is('users/'.$role->name.'*') ? 'active' : '' }}">
          <x-ButtonCustom class="sidebar-link btn-sidebar-self" route="/users/{{ $role->name }}">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Data {{ str_replace("_", " ", $role->name) }}</span>
          </x-ButtonCustom>
        </li>
        @endif
      @endforeach
      @endcan

      @can(['view_roles'])
      <li class="sidebar-header">
        Hak Akses
      </li>
      @can('view_roles')
      <li class="sidebar-item {{ Request::is('roles*') ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('roles.index') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Roles</span>
        </a>
      </li>
      @endcan
      @endcan

    </ul>

  </div>
</nav> --}}

<!-- BEGIN: Side Menu -->
<nav class="side-nav">
  <a href="" class="intro-x flex items-center pl-5 pt-4">
      <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
      <span class="hidden xl:block text-white text-lg ml-3"> Rubick </span> 
  </a>
  <div class="side-nav__devider my-6"></div>
  <ul>
      <li>
          <a href="javascript:;.html" class="side-menu ">
              <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
              <div class="side-menu__title">
                  Dashboard 
                  <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="side-menu__sub-open">
              <li>
                  <a href="{{ route('dashboard') }}" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Overview 1 </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-dashboard-overview-2.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Overview 2 </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-dashboard-overview-3.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Overview 3 </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-dashboard-overview-4.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Overview 4 </div>
                  </a>
              </li>
          </ul>
      </li>
      <li>
          <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
              <div class="side-menu__title">
                  Menu Layout 
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="">
              <li>
                  <a href="side-menu-dark-dashboard-overview-1.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Side Menu </div>
                  </a>
              </li>
              <li>
                  <a href="simple-menu-dark-dashboard-overview-1.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Simple Menu </div>
                  </a>
              </li>
              <li>
                  <a href="top-menu-dark-dashboard-overview-1.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Top Menu </div>
                  </a>
              </li>
          </ul>
      </li>
      <li>
          <a href="side-menu-dark-inbox.html" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
              <div class="side-menu__title"> Inbox </div>
          </a>
      </li>
      <li>
          <a href="side-menu-dark-file-manager.html" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
              <div class="side-menu__title"> File Manager </div>
          </a>
      </li>
      <li>
          <a href="side-menu-dark-point-of-sale.html" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="credit-card"></i> </div>
              <div class="side-menu__title"> Point of Sale </div>
          </a>
      </li>
      <li>
          <a href="side-menu-dark-chat.html" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
              <div class="side-menu__title"> Chat </div>
          </a>
      </li>
      <li>
          <a href="side-menu-dark-post.html" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
              <div class="side-menu__title"> Post </div>
          </a>
      </li>
      <li>
          <a href="side-menu-dark-calendar.html" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
              <div class="side-menu__title"> Calendar </div>
          </a>
      </li>
      <li class="side-nav__devider my-6"></li>
      <li>
          <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
              <div class="side-menu__title">
                  Crud 
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="">
              <li>
                  <a href="side-menu-dark-crud-data-list.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Data List </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-crud-form.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Form </div>
                  </a>
              </li>
          </ul>
      </li>
      <li>
          <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
              <div class="side-menu__title">
                  Users 
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="">
              <li>
                  <a href="side-menu-dark-users-layout-1.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Layout 1 </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-users-layout-2.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Layout 2 </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-users-layout-3.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Layout 3 </div>
                  </a>
              </li>
          </ul>
      </li>
      <li>
          <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="trello"></i> </div>
              <div class="side-menu__title">
                  Profile 
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="">
              <li>
                  <a href="side-menu-dark-profile-overview-1.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Overview 1 </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-profile-overview-2.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Overview 2 </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-profile-overview-3.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Overview 3 </div>
                  </a>
              </li>
          </ul>
      </li>
      <li>
          <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="layout"></i> </div>
              <div class="side-menu__title">
                  Pages 
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="">
              <li>
                  <a href="javascript:;" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title">
                          Wizards 
                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                      </div>
                  </a>
                  <ul class="">
                      <li>
                          <a href="side-menu-dark-wizard-layout-1.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 1</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-wizard-layout-2.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 2</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-wizard-layout-3.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 3</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title">
                          Blog 
                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                      </div>
                  </a>
                  <ul class="">
                      <li>
                          <a href="side-menu-dark-blog-layout-1.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 1</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-blog-layout-2.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 2</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-blog-layout-3.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 3</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title">
                          Pricing 
                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                      </div>
                  </a>
                  <ul class="">
                      <li>
                          <a href="side-menu-dark-pricing-layout-1.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 1</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-pricing-layout-2.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 2</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title">
                          Invoice 
                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                      </div>
                  </a>
                  <ul class="">
                      <li>
                          <a href="side-menu-dark-invoice-layout-1.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 1</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-invoice-layout-2.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 2</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title">
                          FAQ 
                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                      </div>
                  </a>
                  <ul class="">
                      <li>
                          <a href="side-menu-dark-faq-layout-1.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 1</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-faq-layout-2.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 2</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-faq-layout-3.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Layout 3</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="login-dark-login.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Login </div>
                  </a>
              </li>
              <li>
                  <a href="login-dark-register.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Register </div>
                  </a>
              </li>
              <li>
                  <a href="main-dark-error-page.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Error Page </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-update-profile.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Update profile </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-change-password.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Change Password </div>
                  </a>
              </li>
          </ul>
      </li>
      <li class="side-nav__devider my-6"></li>
      <li>
          <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
              <div class="side-menu__title">
                  Components 
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="">
              <li>
                  <a href="javascript:;" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title">
                          Table 
                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                      </div>
                  </a>
                  <ul class="">
                      <li>
                          <a href="side-menu-dark-regular-table.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Regular Table</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-tabulator.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Tabulator</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title">
                          Overlay 
                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                      </div>
                  </a>
                  <ul class="">
                      <li>
                          <a href="side-menu-dark-modal.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Modal</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-slide-over.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Slide Over</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-notification.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Notification</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="side-menu-dark-tab.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Tab </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-accordion.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Accordion </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-button.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Button </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-alert.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Alert </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-progress-bar.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Progress Bar </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-tooltip.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Tooltip </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-dropdown.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Dropdown </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-typography.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Typography </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-icon.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Icon </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-loading-icon.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Loading Icon </div>
                  </a>
              </li>
          </ul>
      </li>
      <li>
          <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="sidebar"></i> </div>
              <div class="side-menu__title">
                  Forms 
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="">
              <li>
                  <a href="side-menu-dark-regular-form.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Regular Form </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-datepicker.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Datepicker </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-tom-select.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Tom Select </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-file-upload.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> File Upload </div>
                  </a>
              </li>
              <li>
                  <a href="javascript:;" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title">
                          Wysiwyg Editor 
                          <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                      </div>
                  </a>
                  <ul class="">
                      <li>
                          <a href="side-menu-dark-wysiwyg-editor-classic.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Classic</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-wysiwyg-editor-inline.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Inline</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-wysiwyg-editor-balloon.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Balloon</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-wysiwyg-editor-balloon-block.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Balloon Block</div>
                          </a>
                      </li>
                      <li>
                          <a href="side-menu-dark-wysiwyg-editor-document.html" class="side-menu">
                              <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                              <div class="side-menu__title">Document</div>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="side-menu-dark-validation.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Validation </div>
                  </a>
              </li>
          </ul>
      </li>
      <li>
          <a href="javascript:;" class="side-menu">
              <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
              <div class="side-menu__title">
                  Widgets 
                  <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
              </div>
          </a>
          <ul class="">
              <li>
                  <a href="side-menu-dark-chart.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Chart </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-slider.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Slider </div>
                  </a>
              </li>
              <li>
                  <a href="side-menu-dark-image-zoom.html" class="side-menu">
                      <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                      <div class="side-menu__title"> Image Zoom </div>
                  </a>
              </li>
          </ul>
      </li>
  </ul>
</nav>
<!-- END: Side Menu -->