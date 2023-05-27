@extends('myLayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-Medium mr-auto">
        Peminjaman
    </h2>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="whitespace-nowrap">Kode</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="whitespace-nowrap">Kelas</th>
                    <th class="whitespace-nowrap">Status</th>
                    <th class="whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->kelas ? $data->kelas->nama : '' }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <a href="{{ route('peminjamans.show', $data->id) }}">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
