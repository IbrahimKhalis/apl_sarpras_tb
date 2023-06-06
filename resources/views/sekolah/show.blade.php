@extends('mylayouts.main')

@section('content')

{{-- <div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $sekolah->nama }}</h4>
        <h4>{{ $sekolah->npsn }}</h4>

        @if ($sekolah->logo != '/img/tutwuri.png')
                            <img src="{{ asset('storage/' . $sekolah->logo) }}" alt=""
                                style="width: 50px;height:50px;object-fit: cover">
                            @else
                            <img src="{{ $sekolah->logo }}" alt="" style="width: 50px;height:50px;object-fit: cover">
                            @endif
    </div>
</div> --}}

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail {{ $sekolah->nama }}
    </h2>
</div>

<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-4 flex justify-center items-center">
            <div class="w-72 mx-auto py-4">
                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                    <div class="h-64 relative image-fit cursor-pointer zoom-in mx-auto">
                        <img class="object-cover" alt="Logo detail sekolalh" data-action="zoom"  src="{{ $sekolah->logo }}">
                    </div>
                </div>
                <h3 class="flex items-center justify-center text-lg font-regular mr-auto">Logo Sekolah</h3>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Personal Information -->
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Informasi Sekolah
                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12 xl:col-span-6">
                        <div>
                            <h2 class="font-normal text-xs mr-auto">Nama Sekolah:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $sekolah->nama }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">NPSN:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $sekolah->npsn }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Nama Kepala Sekolah:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $sekolah->kepala_sekolah }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Jenjang:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $sekolah->jenjang }}</h2>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3 xl:mt-0">
                            <h2 class="font-normal text-xs mr-auto">Alamat:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $sekolah->alamat }}</h2>
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
            Informasi Admin Sekolah ({{ $sekolah->nama }})
        </h2>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-8 gap-x-5">
            <div class="col-span-12 xl:col-span-6">
                <div>
                    <h2 class="font-normal text-xs mr-auto">Nama Admin Sekolah:</h2>
                    <h2 class="text-lg font-normal mr-auto">{{ $sekolah->user->name }}</h2>
                </div>
                <div class="mt-3">
                    <h2 class="font-normal text-xs mr-auto">Email Admin Sekolah:</h2>
                    <h2 class="text-lg font-normal mr-auto">{{ $sekolah->user->email }}</h2>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection