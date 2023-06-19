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

{{-- <div class="intro-y flex items-center mt-8">
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
</div> --}}

<div class="content">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Profile Layout
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative  cursor-pointer zoom-in">
                    @if ($sekolah->logo != '/img/tutwuri.png')
                    <img src="{{ asset('storage/' . $sekolah->logo) }}" alt=""
                        style="object-fit: cover" class="rounded-full" data-action="zoom">
                    @else
                    <img src="{{ $sekolah->logo }}" alt="" style="object-fit: cover" class="rounded-full" data-action="zoom">
                    @endif 
                </div>
               
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $sekolah->nama }}</div>
                    <div class="text-slate-500">NPSN : {{ $sekolah->npsn }}</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> denzelwashington@left4code.com </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="instagram" class="w-4 h-4 mr-2"></i> Instagram Denzel Washington </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="twitter" class="w-4 h-4 mr-2"></i> Twitter Denzel Washington </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">201</div>
                    <div class="text-slate-500">Orders</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">1k</div>
                    <div class="text-slate-500">Purchases</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-primary text-xl">492</div>
                    <div class="text-slate-500">Reviews</div>
                </div>
            </div>
        </div>
        <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist" >
            <li id="profile-tab" class="nav-item" role="presentation">
                <a  data-toggle="tab" data-target="#profile" href="#profile" class="tab-link nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="user"></i> Profile </a>
            </li>
            <li id="account-tab" class="nav-item" role="presentation">
                <a data-toggle="tab" data-target="#statistik" href="#statistik" class="tab-link nav-link py-4 flex items-center" data-tw-target="#account" aria-selected="false" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="bar-chart"></i> Statistic </a>
            </li>
            <li id="change-password-tab" class="nav-item" role="presentation">
                <a data-toggle="tab" data-target="#product" href="#product" class="tab-link nav-link py-4 flex items-center" data-tw-target="#change-password" aria-selected="false" role="tab" > <i class="w-4 h-4 mr-2" data-lucide="package"></i> Product </a>
            </li>
        </ul>
    </div>
    <!-- END: Profile Info -->
    <div class="tab-content mt-5">
        <div id="profile" class="tab-pane active">
            <h2 class="font-medium text-lg">Profile</h2>
            <p>This is the profile tab content.</p>
        </div>
        <div id="statistik" class="tab-pane">
            <h2 class="font-medium text-lg">Statistik</h2>
            <p>This is the Statistik tab content.</p>
        </div>
        <div id="product" class="tab-pane">
            <h2 class="font-medium text-lg">Product</h2>
            <p>This is the Product tab content.</p>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.tab-link').on('click', function(e) {
            e.preventDefault();

            
            $('.tab-link').removeClass('active');


            $(this).addClass('active');

           
            $('.tab-pane').removeClass('active');


            var target = $(this).data('target');
            $(target).addClass('active');
        });
    });
</script>
@endsection