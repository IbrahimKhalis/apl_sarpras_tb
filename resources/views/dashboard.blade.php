@extends('mylayouts.main')

@push('css')
<style>
  .title {
    font-weight: 500;
  }

  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }

  #container {
    height: 400px;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
</style>
@endpush

@section('content')
<div class="grid grid-cols-12 gap-6">
  <div class="col-span-12 2xl:col-span-9">
    <div class="grid grid-cols-12 gap-6">
      <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center justify-between h-10">
          <h2 class="text-lg font-medium truncate mr-5">
            Dashboard
          </h2>
          <form action="" class="form-filter">
            <input type="hidden" name="bulan" value="{{ request('bulan') }}">
          </form>
          <select id="bulan" class="tom-select">
            <option value="all" {{ request('bulan') ? (request('bulan')=='all' ? 'selected' : '' ) : 'selected' }}>Semua
              Bulan</option>
            @foreach (config('services.bulan') as $key => $bulan)
            <option value="{{ $key + 1 }}" {{ request('bulan') ? (request('bulan')==$key+1 ? 'selected' : '' ) : '' }}>
              {{ $bulan }}
            </option>
            @endforeach
          </select>
        </div>
        @if (Auth::user()->hasRole('super_admin'))
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
          <div class="report-box zoom-in">
            <div class="box p-5">
              <div class="flex">
                <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                <div class="ml-auto">
                  <div class="report-box__indicator bg-success tooltip cursor-pointer"
                    title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i>
                  </div>
                </div>
              </div>
              <div class="text-3xl font-medium leading-8 mt-6">{{ $countTahunAjaran }}</div>
              <div class="text-base text-slate-500 mt-1">Jumlah Tahun Ajaran</div>
            </div>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
          <div class="report-box zoom-in">
            <div class="box p-5">
              <div class="flex">
                <i data-lucide="user" class="report-box__icon text-success"></i>
                <div class="ml-auto">
                  <div class="report-box__indicator bg-success tooltip cursor-pointer"
                    title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i>
                  </div>
                </div>
              </div>
              <div class="text-3xl font-medium leading-8 mt-6">{{ $countRole }}</div>
              <div class="text-base text-slate-500 mt-1">Roles</div>
            </div>
          </div>
        </div>
        @else
        <div class="flex gap-3 my-3">
          <div
            class="max-w-sm text-center w-1/3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $total_kategori }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Kategori</p>
          </div>
          <div
            class="max-w-sm text-center w-1/3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $total_produk }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Produk</p>
          </div>
          <div
            class="max-w-sm text-center w-1/3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $total_ruang }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Ruang</p>
          </div>
        </div>
        <div class="flex gap-3">
          <div id="container-produk" class="w-1/2"></div>
          <div id="container-ruang" class="w-1/2"></div>
        </div>
        <div class="flex gap-3 mt-3">
          <div id="container-kelas" class="w-1/2"></div>
          <div id="container-email" class="w-1/2"></div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
@if (Auth::user()->hasRole('admin'))
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  Highcharts.chart('container-produk', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Produk sering dipinjam',
  },
  subtitle: {
    text: '',
  },
  xAxis: {
    categories: {!! json_encode($sub_terbanyak['key']) !!},
    title: {
      text: null
    },
    gridLineWidth: 1,
    lineWidth: 0
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Total Barang',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    },
    gridLineWidth: 0
  },
  tooltip: {
    valueSuffix: ' Peminjaman'
  },
  plotOptions: {
    bar: {
      borderRadius: '5%',
    }
  },
  legend: {
    enabled: false
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Jumlah',
    data: {!! json_encode($sub_terbanyak['data']) !!}
  }]
});
</script>
<script>
  Highcharts.chart('container-ruang', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Ruang Sering dipinjam'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!! json_encode($ruang_terbanyak['key']) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    tooltip: {
      valueSuffix: ' Peminjaman'
    },
    series: [{
        name: 'Jumlah',
        data: {!! json_encode($ruang_terbanyak['data']) !!}
    }]
});
</script>
<script>
  Highcharts.chart('container-kelas', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Kelas Sering minjem'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!! json_encode($kelas_terbanyak['key']) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    tooltip: {
      valueSuffix: ' Peminjaman'
    },
    series: [{
        name: 'Jumlah',
        data: {!! json_encode($kelas_terbanyak['data']) !!}
    }]
});
</script>
<script>
  Highcharts.chart('container-email', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Email sering minjam',
  },
  subtitle: {
    text: '',
  },
  xAxis: {
    categories: {!! json_encode($email_terbanyak['key']) !!},
    title: {
      text: null
    },
    gridLineWidth: 1,
    lineWidth: 0
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Total Barang',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    },
    gridLineWidth: 0
  },
  tooltip: {
    valueSuffix: ' Peminjaman'
  },
  plotOptions: {
    bar: {
      borderRadius: '5%',
    }
  },
  legend: {
    enabled: false
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Jumlah',
    data: {!! json_encode($email_terbanyak['data']) !!}
  }]
});
</script>
<script>
  $('select#bulan').on('change', function(){
  $('.form-filter input').val($(this).val())
  $('.form-filter').submit();
})
</script>
@endif
@endpush