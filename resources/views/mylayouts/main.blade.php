<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Sarpras TB</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
  <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.3/css/common.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <style>
    .swal2-title {
      line-height: 2rem;
    }
  </style>
  @stack('css')
</head>

<body class="py-5" onload="document.body.style.visibility=`visible`;">
  <script>
    document.body.style.visibility=`hidden`;
  </script>

  @include('mypartials.mobile')
  <div class="flex">
    @include('mypartials.aside')
    <div class="content">
      @include('mypartials.navbar')
      @yield('content')
    </div>
    <div data-url="#"
      class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
      <button class="dark-mode-switcher">Change Theme</button>
    </div>
    <form action="" class="form-delete" method="POST">
      @csrf
      @method('delete')
      @stack('other_delete')
    </form>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
      function goBack() {
          window.history.back();
        }
    </script>
    <script>
      const sideMenuLinks = document.querySelectorAll('.side-menu');
        sideMenuLinks.forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('side-menu--active');
            }
        })
    </script>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script> --}}
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    {{-- <script src="path/to/vanilla.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/create-file-list"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/fstdropdown.js') }}"></script>
    <script>
      setFstDropdown();
    </script>
    @include('mypartials.js')
    <script>
      function deleteData(url) {
            Swal.fire({
                title: 'Apakah anda yakin ingin hapus data ini?',
                text: "Data yang terhapus tidak dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'

            }).then((result) => {
                if (result.isConfirmed) {
                    $('.form-delete').attr('action', url).submit();
                }
            })
        }
    </script>
    <script>
      const themeSwitcher = document.querySelector('.dark-mode-switcher');
    const htmlEl = document.querySelector('html');
    const currentTheme = localStorage.getItem('theme') || 'dark';
    htmlEl.classList.add(currentTheme);

    window.addEventListener('load', () => {
      if (currentTheme === 'dark') {
        htmlEl.classList.add('dark');
        htmlEl.classList.remove('light');
      } else {
        htmlEl.classList.add('light');
        htmlEl.classList.remove('dark');
      }
    });

    const buttonEl = themeSwitcher.querySelector('button');
    if (currentTheme === 'dark') {
      buttonEl.textContent = 'Light Mode';
    } else {
      buttonEl.textContent = 'Dark Mode';
    }

    themeSwitcher.addEventListener('click', () => {
      htmlEl.classList.toggle('dark');
      htmlEl.classList.toggle('light');

      const newTheme = htmlEl.classList.contains('dark') ? 'dark' : 'light';
      localStorage.setItem('theme', newTheme);

    
      if (htmlEl.classList.contains('dark')) {
        buttonEl.textContent = 'Light Mode';
      } else {
        buttonEl.textContent = 'Dark Mode';
      }
    });
    </script>
    @stack('js')
</body>

</html>