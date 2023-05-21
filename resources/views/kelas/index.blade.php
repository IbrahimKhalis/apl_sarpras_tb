@extends('mylayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-Medium mr-auto">
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No.</th>
                    <th class="whitespace-nowrap">Sekolah</th>
                    <th class="whitespace-nowrap">Kelas</th>
                    <th class="whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->sekolah->nama}}</td>
                        <td>{{ $data->nama}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex">
                                <a class="flex items-center mr-3" href="{{ route('kelas.edit', $data->id) }}"> <i
                                        data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        @if (auth()->user()->can('delete_kelas'))
                                        <button type="submit" class="btn btn-danger btn-sm rounded"
                                            onclick="deleteData('{{ route('kelas.destroy', [$data->id]) }}')"
                                           >Hapus</button>
                                    </td>
                                    @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection