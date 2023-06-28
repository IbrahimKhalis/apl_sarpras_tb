@extends('myLayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-semibold mr-auto">
        Data Kategori
    </h2>
    @can('add_kategori')
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">
            <a href="{{ route('kategori.create') }}">
                Tambah Kategori
            </a>
        </button>
    </div>
    @endcan
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped" id="tabel_kategori">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="whitespace-nowrap">Kategori</th>
                    <th class="whitespace-nowrap">Sub</th>
                    @can('edit_kategori', 'delete_kategori')
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
    let tabel_kategori = $('#tabel_kategori').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('kategori.data') }}',
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