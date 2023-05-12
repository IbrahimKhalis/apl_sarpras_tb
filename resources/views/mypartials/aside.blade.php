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

      @if (auth()->user()->can('view_tahun_ajaran') || auth()->user()->can('view_agama') ||
      auth()->user()->can('view_kelas'))
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
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Data {{ str_replace("_", " ",
            $role->name) }}</span>
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
    <span class="hidden xl:block text-white text-lg">Sarpras</span>
  </a>
  <div class="side-nav__devider my-6"></div>
  <ul>
    <li>
      <a href="{{ route('dashboard') }}" class="side-menu {{ Request::is('dashboard*') ? 'active' : '' }}">
        <div class="side-menu__icon"> <i data-lucide="home"></i></div>
        <div class="side-menu__title">Dashboard</div>
      </a>
    </li>

    @can('view_sekolah')
    <li>
      <a href="{{ route('sekolah.index') }}" class="side-menu {{ Request::is('sekolah*') ? 'active' : '' }}">
        <div class="side-menu__icon"> <i data-lucide="inbox"></i></div>
        <div class="side-menu__title">Sekolah</div>
      </a>
    </li>
    @endcan

    @if (auth()->user()->can('view_tahun_ajaran') || auth()->user()->can('view_agama') ||
    auth()->user()->can('view_kelas'))

    <li>
      <a href="javascript:;.html" class="side-menu ">
        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
        <div class="side-menu__title">
          Data Master
          <div class="side-menu__sub-icon"> <i data-lucide="chevron-down"></i> </div>
        </div>
      </a>
      <ul class="side-menu__sub">
        @can('view_tahun_ajaran')
        <li>
          <a href="{{ route('tahun-ajaran.index') }}"
            class="side-menu {{ Request::is('data-master/tahun-ajaran*') ? 'active' : '' }}">
            <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
            <div class="side-menu__title">Tahun Ajaran</div>
          </a>
        </li>
        @endcan

        @can('view_kelas')
        <li>
          <a href="{{ route('kelas.index') }}"
            class="side-menu {{ Request::is('data-master/kelas*') ? 'active' : '' }}">
            <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
            <div class="side-menu__title">Kelas</div>
          </a>
        </li>
        @endcan
        @endif
      </ul>
    </li>
    @can('view_users')
    <li class="side-menu">
      <div class="side-menu__icon"> <i data-lucide="inbox"></i></div>
      <div class="side-menu__title">Data User</div>
    </li>
    @foreach ($roles as $role)
    @if ($role->name != 'admin' && $role->name != 'super_admin')
    <li>
      <a href="/users/{{ $role->name }}" class="side-menu {{ Request::is('users/'.$role->name.'*') ? 'active' : '' }}">
        <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
        <div class="side-menu__title">Data {{ str_replace("_", " ", $role->name) }}</div>
      </a>
    </li>
    @endif
    @endforeach
    @endcan

    @can(['view_roles'])
    <li>
      <a href="{{ route('roles.index') }}" class="side-menu {{ Request::is('roles*') ? 'active' : '' }}">
        <div class="side-menu__icon"> <i data-lucide="inbox"></i></div>
        <div class="side-menu__title">Roles</div>
      </a>
    </li>
    @endcan
    @can(['view_jurusan'])
    <li>
      <a href="{{ route('jurusan.index') }}" class="side-menu">
        <div class="side-menu__icon"><i data-lucide="users"></i></div>
        <div class="side-menu__title">Jurusan</div>
      </a>
    </li>
    @endcan
  </ul>
</nav>
<!-- END: Side Menu -->