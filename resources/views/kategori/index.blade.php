@extends('myLayouts.main')

@section('content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-Medium mr-auto">
        Data Kategori
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2">
            <a href="{{ route('kategori.create') }}">
                Tambah Kategori
            </a>
        </button>
    </div>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">Kode</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="whitespace-nowrap">Kategori</th>
                    <th class="whitespace-nowrap">Sub</th>
                    <th class="whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jenis}}</td>
                        <td>  @foreach ($data->subcategory as $sub)
                            {{ $sub->nama }},
                        @endforeach</td>
                        <td class="table-report__action w-56">
                            <div class="flex">
                                <a class="flex items-center mr-3" href="{{ route('kategori.edit', $data->id) }}"> <i
                                        data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <button type="submit" class="btn btn-danger btn-sm rounded"
                                        onclick="deleteData('{{ route('kategori.destroy', [$data->id]) }}')"
                                       >Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection