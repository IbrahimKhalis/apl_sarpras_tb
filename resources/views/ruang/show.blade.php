@extends('mylayouts.main')

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail {{ $ruang->name }}
    </h2>
</div>

<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Informasi Ruang
                </h2>
                <a href="{{ route('ruang.index') }}" class="btn btn-danger">Kembali</a>
            </div>
            <div class="p-5">
                <div class="grid gap-x-5">
                    <div class=" xl:col-span-6">
                        <div>
                            <h2 class="font-normal text-xs mr-auto">Nama Ruang:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $ruang->name }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Kategori Ruang:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $ruang->kategori->nama }}</h2>
                        </div>
                        <hr class="mt-3 mb-3">
                        <div class="mt-5 xl:mt-0">
                            <h2 class="font-normal text-xl mr-auto">Produks :</h2>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Kondisi / ket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ruang->produk as $produk)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $produk->nama }}</td>
                                        <td>{{ $produk->kode }}</td>
                                        <td>{{ $produk->kondisi }} / {{ $produk->ket_produk }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Personal Information -->
    </div>
</div>

@endsection