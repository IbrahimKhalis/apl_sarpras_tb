<header>
    <div class="nav">
        <div class="title">
            <a href="{{ route('index') }}" class="logo">Sarpras</a>
        </div>
        <ul class="navbar">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('faq') }}">FAQ</a></li>
            <li><a href="{{ route('peminjaman.create') }}">Peminjaman</a></li>
        </ul>
        <div class="left-nav">
            <div class="main">
                <a href="{{ route('login') }}">Login</a>
            </div>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </div>
</header>