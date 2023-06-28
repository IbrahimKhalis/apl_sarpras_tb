@extends('myLayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-bold mr-auto">
        FAQ
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('faq.create') }}">
            <button class="btn btn-primary shadow-md mr-2">
                Tambah FAQ
            </button>
        </a>
    </div>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="whitespace-nowrap">Konten</th>
                    <th class="whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->konten }}</td>
                    <td>
                        <div class="flex gap-2">
                            <a class="btn btn-warning mr-3" href="{{ route('faq.edit', $data->id) }}">Edit</a>
                            @if (auth()->user()->can('delete_faq'))
                            <button type="submit" class="btn btn-danger btn-sm rounded"
                                onclick="deleteData('{{ route('faq.destroy', [$data->id]) }}')">Hapus</button>
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