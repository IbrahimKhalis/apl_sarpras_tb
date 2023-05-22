@extends('myLayouts.main')

@section('content')
<div class="flex items-center" style="justify-content: space-between;">
    <h2 class="intro-y text-lg font-medium mt-10">
        Produk
    </h2>
    <a href="{{ route('produk.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Produk</a>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">Jurusan</th>
                    <th class="whitespace-nowrap">Nama Kaprog</th>
                    <th class="text-center whitespace-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                <tr>
                    <td>
                        <a href="{{ route('produk.edit', $produk->id) }}">edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
</div>
@endsection