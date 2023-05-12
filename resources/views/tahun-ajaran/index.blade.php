@extends('mylayouts.main')

@section('content')
{{-- <div class="d-flex justify-content-between mb-3">
    <h4><strong>Tahun Ajaran</strong></h4>
    <a href="{{ route('tahun-ajaran.create') }}" 
    class="btn btn-primary text-white float-right">Tambah</a>
</div>
<div class="card">
    <div class="card-body">
        <div class="table table-responsive table-hover text-center mt-2">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tahun Awal</th>
                        <th scope="col">Tahun Akhir</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahun_ajarans as $tahun_ajaran)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $tahun_ajaran->tahun_awal }}</td>
                        <td>{{ $tahun_ajaran->tahun_akhir }}</td>
                        <td>{{ $tahun_ajaran->status }}</td>
                        <td>
                            <a href="{{ route('tahun-ajaran.edit', [$tahun_ajaran->id]) }}" 
                                class="btn btn-sm btn-warning text-white px-3">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-Medium mr-auto">
        Tahun Ajaran
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">
            <a href="{{ route('tahun-ajaran.create') }}">
                Tambah
            </a>
        </button>
    </div>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="whitespace-nowrap">Tahun Awal</th>
                    <th class="whitespace-nowrap">Tahun Terakhir</th>
                    <th class="whitespace-nowrap">Status</th>
                    <th class="whitespace-nowrap">Action</th>    
                </tr>
            </thead>
            <tbody>
                @foreach ($tahun_ajarans as $tahun_ajaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tahun_ajaran->tahun_awal }}</td>
                        <td>{{ $tahun_ajaran->tahun_akhir }}</td>
                        <td>{{ $tahun_ajaran->status }}</td>
                        <td>
                            <a href="{{ route('tahun-ajaran.edit', [$tahun_ajaran->id]) }}" 
                                class="btn btn-sm btn-warning text-white px-3">Edit</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection