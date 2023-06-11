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
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Dashboard
                    </h2>
                    <select name="" id="">
                        <option value="all">Semua Bulan</option>
                        @foreach (config('services.bulan') as $key => $bulan)
                        <option value="{{ $key + 1 }}">{{ $bulan }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    @if (Auth::user()->hasRole('super_admin'))
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                            title="12% Higher than last month"> 12% <i data-lucide="chevron-up"
                                                class="w-4 h-4 ml-0.5"></i> </div>
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
                                            title="22% Higher than last month"> 22% <i data-lucide="chevron-up"
                                                class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ $countRole }}</div>
                                <div class="text-base text-slate-500 mt-1">Roles</div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="flex">
                        {{--! Distyle --}}
                        <div>Total Kategori : {{ $total_kategori }}</div>
                        <div>Total Produk : {{ $total_produk }}</div>
                        <div>Total Ruang : {{ $total_ruang }}</div>
                    </div>
                    <div>
                        <div id="container"></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    Highcharts.chart('container', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Produk sering dipinjam',
    align: 'left'
  },
  subtitle: {
    text: '',
  },
  xAxis: {
    categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
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
    valueSuffix: ' millions'
  },
  plotOptions: {
    bar: {
      borderRadius: '50%',
      dataLabels: {
        enabled: true
      },
      groupPadding: 0.1
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 80,
    floating: true,
    borderWidth: 1,
    backgroundColor:
      Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Year 1990',
    data: [631, 727, 3202, 721, 26]
  }]
});
</script>
@endpush