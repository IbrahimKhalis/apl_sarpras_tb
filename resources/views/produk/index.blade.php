@extends('myLayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-Medium mr-auto">
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
<div class="mt-3">
    <div class="search hidden sm:block">
        <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
    </div>
</div>
<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
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
                @foreach ($produks as $data)
                <tr>
                    <td>{{ $data->nama }}</td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ ($data->subcategorie ? $data->subcategorie->nama : '') }}</a>
                    </td>
                    <td>{{ $data->merek }}</td>
                    <td>{{ $data->kondisi }}</td>
                    <td class="table-report__action w-56">
                        <div class="flex">
                            @can('edit_produk')
                            <a class="flex items-center mr-3" href="{{ route('produk.edit', $data->id) }}"> <i
                                    data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            @endcan
                            @can('delete_produk')
                            <button type="submit" class="btn btn-danger btn-sm rounded"
                                onclick="deleteData('{{ route('produk.destroy', [$data->id]) }}')">Hapus</button>
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
    {{ $produks->links() }}
</div>

@endsection