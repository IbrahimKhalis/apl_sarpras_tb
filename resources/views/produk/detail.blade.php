@extends('mylayouts.main')

@section('content')

{{-- <div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $data->nama }}</h4>
        <h4>{{ $data->npsn }}</h4>

        @if ($data->logo != '/img/tutwuri.png')
                            <img src="{{ asset('storage/' . $data->logo) }}" alt=""
                                style="width: 50px;height:50px;object-fit: cover">
                            @else
                            <img src="{{ $data->logo }}" alt="" style="width: 50px;height:50px;object-fit: cover">
                            @endif
    </div>
</div> --}}

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail {{ $data->nama }}
    </h2>
</div>

<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-4 flex justify-center items-center">
            <div class="w-72 mx-auto py-4">
                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                    <div class="h-64 relative image-fit cursor-pointer zoom-in mx-auto">
                        <img class="object-cover" alt="Detail Foto Produk" data-action="zoom"  src="{{ $data->fotos }}">
                    </div>
                </div>
                <h3 class="flex items-center justify-center text-lg font-regular mr-auto">Foto Produk</h3>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Personal Information -->
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Informasi Produk
                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12 xl:col-span-6">
                        <div>
                            <h2 class="font-normal text-xs mr-auto">Nama Produk</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $data->nama }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Merk Produk</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $data->merek }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Sekali Pakai</h2>
                            <input type="checkbox" class="form-check-input mr-auto" name="sekali_pakai" {{ isset($data) ? ($data->sekali_pakai ? 'checked' : '') : '' }} disabled>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6 ">
                        <div class="">
                            <h2 class="font-normal text-xs mr-auto">Kategori</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $data->kategori->nama }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Sub Kaategori</h2>
                            <h2 class="text-lg font-normal mr-auto"> <ul>
                                @foreach ($subcategories as $subcategory)
                                  <li>{{ $subcategory->nama }}</li>
                                @endforeach
                              </ul></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Personal Information -->
    </div>
</div>
<div class="intro-y box mt-5">
    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">
            Informasi Detail Produk 
        </h2>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-8 gap-x-5">
            <div class="col-span-12 xl:col-span-6">
                <div>
                    <h2 class="font-normal text-xs mr-auto">Keterangan Produk</h2>
                    <h2 class="text-lg font-normal mr-auto">{{ $data->ket_produk }}</h2>
                </div>
                <div class="mt-3">
                    <h2 class="font-normal text-xs mr-auto">Keterangan Detail Produk</h2>
                    <h2 class="text-lg font-normal mr-auto">{{ $data->ket_kondisi }}</h2>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection