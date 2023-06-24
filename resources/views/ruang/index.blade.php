@extends('myLayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-bold mr-auto">
        Data Ruang
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">
            <a href="{{ route('ruang.create') }}">
                Tambah Ruang
            </a>
        </button>
    </div>
</div>
<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped" id="tabel_ruang">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
                    <th class="whitespace-nowrap">Ruang</th>
                    <th class="whitespace-nowrap">Kategori</th>
                    <th class="whitespace-nowrap">Status Dipinjam</th>
                    @can('edit_ruang', 'delete_ruang')
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
    let tabel_ruang = $('#tabel_ruang').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('ruang.data') }}',
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