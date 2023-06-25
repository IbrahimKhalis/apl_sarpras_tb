@extends('mylayouts.main')

@section('content')
<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Data Sekolah
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div
                    class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative  cursor-pointer zoom-in">
                    @if ($sekolah->logo != '/img/tutwuri.png')
                    <img src="{{ asset('storage/' . $sekolah->logo) }}" alt="" style="object-fit: cover"
                        class="rounded-full" data-action="zoom">
                    @else
                    <img src="{{ $sekolah->logo }}" alt="" style="object-fit: cover" class="rounded-full"
                        data-action="zoom">
                    @endif
                </div>

                <div class="ml-5">
                    <div class="truncate sm:whitespace-normal font-medium text-lg">{{ $sekolah->nama }}
                    </div>
                    <div class="text-slate-500">NPSN : {{ $sekolah->npsn }}</div>
                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">{{ $total_peminjaman }}</div>
                    <div class="text-slate-500">Peminjaman</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">{{ $total_kategori }}</div>
                    <div class="text-slate-500">Kategori</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">{{ $total_produk }}</div>
                    <div class="text-slate-500">Produk</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">{{ $total_ruang }}</div>
                    <div class="text-slate-500">Ruang</div>
                </div>
            </div>
        </div>
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
            <li id="account-tab" class="nav-item" role="presentation">
                <a data-toggle="tab" data-target="#statistik" href="#statistik"
                    class="tab-link nav-link py-4 flex items-center active" data-tw-target="#statistik"
                    aria-selected="false" role="tab"> <i class="w-4 h-4 mr-2" data-lucide="bar-chart"></i> Statistic
                </a>
            </li>
            <li id="account-tab" class="nav-item" role="presentation">
                <a data-toggle="tab" data-target="#peminjaman" href="#peminjaman"
                    class="tab-link nav-link py-4 flex items-center" data-tw-target="#peminjaman" aria-selected="false"
                    role="tab"> <i class="w-4 h-4 mr-2" data-lucide="bar-chart"></i> Peminjaman
                </a>
            </li>
            <li id="account-tab" class="nav-item" role="presentation">
                <a data-toggle="tab" data-target="#kategori" href="#kategori"
                    class="tab-link nav-link py-4 flex items-center" data-tw-target="#kategori" aria-selected="false"
                    role="tab"> <i class="w-4 h-4 mr-2" data-lucide="bar-chart"></i> Kategori
                </a>
            </li>
            <li id="change-password-tab" class="nav-item" role="presentation">
                <a data-toggle="tab" data-target="#product" href="#product"
                    class="tab-link nav-link py-4 flex items-center" data-tw-target="#product" aria-selected="false"
                    role="tab"> <i class="w-4 h-4 mr-2" data-lucide="package"></i> Product </a>
            </li>
            <li id="account-tab" class="nav-item" role="presentation">
                <a data-toggle="tab" data-target="#ruang" href="#ruang" class="tab-link nav-link py-4 flex items-center"
                    data-tw-target="#ruang" aria-selected="false" role="tab"> <i class="w-4 h-4 mr-2"
                        data-lucide="bar-chart"></i> Ruang
                </a>
            </li>
        </ul>
        <div class="tab-content" style="padding-bottom: 2rem; padding-top: 2rem">
            <div id="statistik" class="tab-pane active">
                <div class="flex gap-3">
                    @include('grafik.produk')
                    @include('grafik.ruang')
                </div>
                <div class="flex gap-3 mt-3">
                    @include('grafik.kelas')
                    @include('grafik.email')
                </div>
            </div>
            <div id="peminjaman" class="tab-pane">
                <table class="table table-striped" id="table_peminjaman">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">No</th>
                            <th class="whitespace-nowrap">Kode</th>
                            <th class="whitespace-nowrap">Nama</th>
                            <th class="whitespace-nowrap">Kelas</th>
                            <th class="whitespace-nowrap">Status</th>
                            <th class="whitespace-nowrap">Status Pengembalian</th>
                            <th class="whitespace-nowrap">Status Telat</th>
                            <th class="whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div id="kategori" class="tab-pane">
                <table class="table table-striped" id="tabel_kategori">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">No.</th>
                            <th class="whitespace-nowrap">Nama</th>
                            <th class="whitespace-nowrap">Kategori</th>
                            <th class="whitespace-nowrap">Sub</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div id="ruang" class="tab-pane">
                <table class="table table-striped" id="tabel_ruang">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">No.</th>
                            <th class="whitespace-nowrap">Ruang</th>
                            <th class="whitespace-nowrap">Kategori</th>
                            <th class="whitespace-nowrap">Status Dipinjam</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div id="product" class="tab-pane">
                <table class="table table-striped" id="tabel_produk">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">No</th>
                            <th class="whitespace-nowrap">Nama</th>
                            <th class="whitespace-nowrap">Sub Kategori</th>
                            <th class="whitespace-nowrap">Merek</th>
                            <th class="whitespace-nowrap">Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('.tab-link').on('click', function(e) {
            e.preventDefault();
            $('.tab-link').removeClass('active');
            $(this).addClass('active');
            $('.tab-pane').removeClass('active');
            var target = $(this).data('target');
            $(target).addClass('active');
        });
    });
    let table_peminjaman = $('#table_peminjaman').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('peminjaman.data', request('sekolah')->id) }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'kode'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'kelas'
                },
                {
                    data: 'status'
                },
                {
                    data: 'status_pengembalian'
                },
                {
                    data: 'status_telat'
                },
                {
                    data: 'action',
                    searchable: false,
                    sortable: false
                },
            ]
        });

        let tabel_kategori = $('#tabel_kategori').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('kategori.data', request('sekolah')->id) }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'nama'
                },
                {
                    data: 'jenis'
                },
                {
                    data: 'sub'
                }
            ]
        });

        let tabel_ruang = $('#tabel_ruang').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('ruang.data',request('sekolah')->id) }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'name'
                },
                {
                    data: 'kategori'
                },
                {
                    data: 'dipinjam'
                }
            ]
        });

    let tabel_produk = $('#tabel_produk').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('produk.data', request('sekolah')->id) }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'nama'
                },
                {
                    data: 'sub'
                },
                {
                    data: 'merek'
                },
                {
                    data: 'kondisi'
                }
            ]
        });
</script>
@endpush