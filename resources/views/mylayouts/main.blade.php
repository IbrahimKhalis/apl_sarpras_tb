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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    {{--
    <link href="https://cdn.datatables.net/1.11.3/css/common.min.css" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <style>
        .swal2-title {
            line-height: 2rem;
        }

        .dataTables_length select {
            background-image: none;
        }

        #table-produk_wrapper {
            margin-top: 1rem;
        }

        .table {
            width: 100% !important;
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
            class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full xl:w-40 xl:h-12 flex items-center justify-center z-50 mb-10 mr-10 lg:w-32 lg:h-10 md:w-32 md:h-8  sm:w-32 sm:h-8">
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
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

                Highcharts.theme = {
                colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
                    '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
                chart: {
                    backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                        stops: [
                            [0, '#2a2a2b'],
                            [1, '#3e3e40']
                        ]
                    },
                    style: {
                        fontFamily: '\'Unica One\', sans-serif'
                    },
                    plotBorderColor: '#606063'
                },
                title: {
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase',
                        fontSize: '20px'
                    }
                },
                subtitle: {
                    style: {
                        color: '#E0E0E3',
                        textTransform: 'uppercase'
                    }
                },
                xAxis: {
                    gridLineColor: '#707073',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#707073',
                    minorGridLineColor: '#505053',
                    tickColor: '#707073',
                    title: {
                        style: {
                            color: '#A0A0A3'
                        }
                    }
                },
                yAxis: {
                    gridLineColor: '#707073',
                    labels: {
                        style: {
                            color: '#E0E0E3'
                        }
                    },
                    lineColor: '#707073',
                    minorGridLineColor: '#505053',
                    tickColor: '#707073',
                    tickWidth: 1,
                    title: {
                        style: {
                            color: '#A0A0A3'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.85)',
                    style: {
                        color: '#F0F0F0'
                    }
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            color: '#F0F0F3',
                            style: {
                                fontSize: '13px'
                            }
                        },
                        marker: {
                            lineColor: '#333'
                        }
                    },
                    boxplot: {
                        fillColor: '#505053'
                    },
                    candlestick: {
                        lineColor: 'white'
                    },
                    errorbar: {
                        color: 'white'
                    }
                },
                legend: {
                    backgroundColor: 'rgba(0, 0, 0, 0.5)',
                    itemStyle: {
                        color: '#E0E0E3'
                    },
                    itemHoverStyle: {
                        color: '#FFF'
                    },
                    itemHiddenStyle: {
                        color: '#606063'
                    },
                    title: {
                        style: {
                            color: '#C0C0C0'
                        }
                    }
                },
                credits: {
                    style: {
                        color: '#666'
                    }
                },
                labels: {
                    style: {
                        color: '#707073'
                    }
                },
                drilldown: {
                    activeAxisLabelStyle: {
                        color: '#F0F0F3'
                    },
                    activeDataLabelStyle: {
                        color: '#F0F0F3'
                    }
                },
                navigation: {
                    buttonOptions: {
                        symbolStroke: '#DDDDDD',
                        theme: {
                            fill: '#505053'
                        }
                    }
                },
                // scroll charts
                rangeSelector: {
                    buttonTheme: {
                        fill: '#505053',
                        stroke: '#000000',
                        style: {
                            color: '#CCC'
                        },
                        states: {
                            hover: {
                                fill: '#707073',
                                stroke: '#000000',
                                style: {
                                    color: 'white'
                                }
                            },
                            select: {
                                fill: '#000003',
                                stroke: '#000000',
                                style: {
                                    color: 'white'
                                }
                            }
                        }
                    },
                    inputBoxBorderColor: '#505053',
                    inputStyle: {
                        backgroundColor: '#333',
                        color: 'silver'
                    },
                    labelStyle: {
                        color: 'silver'
                    }
                },
                navigator: {
                    handles: {
                        backgroundColor: '#666',
                        borderColor: '#AAA'
                    },
                    outlineColor: '#CCC',
                    maskFill: 'rgba(255,255,255,0.1)',
                    series: {
                        color: '#7798BF',
                        lineColor: '#A6C7ED'
                    },
                    xAxis: {
                        gridLineColor: '#505053'
                    }
                },
                scrollbar: {
                    barBackgroundColor: '#808083',
                    barBorderColor: '#808083',
                    buttonArrowColor: '#CCC',
                    buttonBackgroundColor: '#606063',
                    buttonBorderColor: '#606063',
                    rifleColor: '#FFF',
                    trackBackgroundColor: '#404043',
                    trackBorderColor: '#404043'
                }
            };
            // Apply the theme
            Highcharts.setOptions(Highcharts.theme);
        });
        </script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        @stack('js')
</body>

</html>