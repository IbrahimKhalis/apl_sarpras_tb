@extends('myLayouts.main')

@section('content')
<div class="flex justify-between items-center">
    <h2 class="intro-y text-lg font-medium mt-10">
        Kategori
    </h2>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('kategori.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Kategori</a>
    </div>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">Kode</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="whitespace-nowrap">Kategori</th>
                    <th class="whitespace-nowrap">Sub</th>
                    <th class="text-center whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->kode }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jenis }}</td>
                    <td>
                        @foreach ($data->subcategory as $sub)
                            {{ $sub->nama }},
                        @endforeach
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="{{ route('kategori.edit', $data->id) }}"> <i
                                    data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                    class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
</div>
@endsection