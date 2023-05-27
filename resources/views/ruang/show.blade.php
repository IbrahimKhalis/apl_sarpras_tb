@extends('mylayouts.main')

@section('content')

{{-- <div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $sekolah->nama }}</h4>
<h4>{{ $sekolah->npsn }}</h4>

@if ($sekolah->logo != '/img/tutwuri.png')
<img src="{{ asset('storage/' . $sekolah->logo) }}" alt="" style="width: 50px;height:50px;object-fit: cover">
@else
<img src="{{ $sekolah->logo }}" alt="" style="width: 50px;height:50px;object-fit: cover">
@endif
</div>
</div> --}}

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail {{ $ruang->name }}
    </h2>
</div>

<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <!-- <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-4 flex justify-center items-center">
            <div class="w-72 mx-auto py-4">
                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                    <div class="h-64 relative image-fit cursor-pointer zoom-in mx-auto">
                        <img class="object-cover" alt="Logo detail sekolalh" src="{{-- $sekolah->logo --}}">
                    </div>
                </div>
                <h3 class="flex items-center justify-center text-lg font-regular mr-auto">Logo Sekolah</h3>
            </div>
        </div>
    </div> -->
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Personal Information -->
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Informasi Ruang
                </h2>
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
                            <h2 class="text-lg font-normal mr-auto">{{ $kategori->nama }}</h2>
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
                                        <th scope='col'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produks_dalam_ruang as $produk)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $produk->nama }}</td>
                                        <td>{{ $produk->kode }}</td>
                                        <td>{{ $produk->kondisi }} / {{ $produk->ket_produk }}</td>
                                        <td><a class="btn">transfer</a> | <a class="btn btn-warning">Hapus</a></td>
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