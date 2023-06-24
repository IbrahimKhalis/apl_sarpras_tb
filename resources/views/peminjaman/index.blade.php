@extends('myLayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-bold mr-auto">
        Peminjaman
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">
            <a href="{{ route('peminjamans.create') }}">
                Tambah Peminjaman
            </a>
        </button>
    </div>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
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
</div>
<div class="modalkey modal fade" id="modalPenagihan" tabindex="-1" aria-labelledby="role" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('peminjaman.penagihan') }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="role">Email Penagihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="peminjaman_id">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        function set(peminjaman_id){
            $('input[name="peminjaman_id"]').val(peminjaman_id)
        }
        
        let table_peminjaman = $('#table_peminjaman').DataTable({
            processing: true,
            ordering: false,
            info: false,
            ajax: {
                url: '{{ route('peminjaman.data') }}',
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
    </script>
@endpush