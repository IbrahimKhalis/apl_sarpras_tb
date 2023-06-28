@extends('mylayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-bold mr-auto">
        Data Kelas
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">
            <a href="{{ route('kelas.create') }}">
                Tambah Kelas
            </a>
        </button>
    </div>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped" id="tabel_kelas">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
                    <th class="whitespace-nowrap">Kelas</th>
                    <th class="whitespace-nowrap">Action</th>
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
    let tabel_kelas = $('#tabel_kelas').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('kelas.data') }}',
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
                    data: 'action',
                    searchable: false,
                    sortable: false
                },
            ]
        });
</script>
@endpush