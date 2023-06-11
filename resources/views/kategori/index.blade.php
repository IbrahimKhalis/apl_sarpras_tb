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
        <table class="table table-striped">
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
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jenis}}</td>
                    <td>
                        <table class="border-black table-auto">
                            @foreach ($data->subcategory as $sub)
                            <tr>
                                <td>{{ $sub->nama }}</td>
                                <td>{{ $sub->kode }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex gap-3">
                            @can('edit_kategori')
                            <a class="btn btn-warning" href="{{ route('kategori.edit', $data->id) }}">Edit</a>
                            @endcan
                            @can('delete_kategori')
                            <button type="submit" class="btn btn-danger btn-sm rounded"
                                onclick="deleteData('{{ route('kategori.destroy', [$data->id]) }}')">Hapus</button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="mt-5">
    {{ $datas->links() }}
</div>
@endsection