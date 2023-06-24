@extends('myLayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-bold mr-auto">
        Data Produk
    </h2>
    @can('add_produk')
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">
            <a href="{{ route('produk.create') }}">
                Tambah produk
            </a>
        </button>
    </div>
    @endcan
</div>
<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped" id="tabel_produk">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="whitespace-nowrap">Sub Kategori</th>
                    <th class="whitespace-nowrap">Merek</th>
                    <th class="whitespace-nowrap">Kondisi</th>
                    @can('edit_produk', 'delete_produk')
                    <th class="whitespace-nowrap">Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    let tabel_produk = $('#tabel_produk').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('produk.data') }}',
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
                },
                {
                    data: 'action',
                    searchable: false,
                    sortable: false
                },
            ]
        });
</script>
@endpush