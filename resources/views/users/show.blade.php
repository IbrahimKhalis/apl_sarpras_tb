@extends('mylayouts.main')

@section('content')
{{-- <div class="d-flex justify-content-between mb-3">
    <h4><strong>Detail {{ $role }}</strong></h4>
    <form action="{{ route('users.index', [$role]) }}" method="get">
        @include('mypartials.tahunajaran')
        <button class="btn btn-danger" type="submit">Kembali</button>
    </form>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="table  table-borderless table-hover">
                    <table class="table align-middle">
                        <tr class="row">
                            <td class="col-3" style="font-weight: 600;">Nama</td>
                            <td class="col-1">:</td>
                            <td class="col-8">{{ $user->name }}</td>
                        </tr>
                        <tr class="row">
                            <td class="col-3" style="font-weight: 600;">Email</td>
                            <td class="col-1">:</td>
                            <td class="col-8">{{ $user->email }}</td>
                        </tr>
                        <tr class="row">
                            <td class="col-3" style="font-weight: 600;">NIP</td>
                            <td class="col-1">:</td>
                            <td class="col-8">{{ $user->nip }}</td>
                        </tr>
                        <tr class="row">
                            <td class="col-3" style="font-weight: 600;">Jenis Kelamin</td>
                            <td class="col-1">:</td>
                            <td class="col-8">{{ $user->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <img class=""
                    src="{{ $user->profil == '/img/profil.png' ? asset($user->profil) : asset('storage/' . $user->profil) }}"
                    alt="profil" style="max-height: 15rem;width: 100%;object-fit: contain">
            </div>
        </div>
    </div>
</div> --}}

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail {{ $role }}
    </h2>
</div>

<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-4 flex justify-center items-center">
            <div class="w-72 mx-auto py-4">
                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-3">
                    <div class="h-64 relative image-fit cursor-pointer zoom-in mx-auto">
                        <img class="object-cover" alt="Logo Profile Petugas" src="{{ $user->profil == '/img/profil.png' ? asset($user->profil) : asset('storage/' . $user->profil) }}"">
                    </div>
                </div>
                <h3 class="flex items-center justify-center text-lg font-regular mr-auto">Profile Petugas</h3>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Personal Information -->
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Informasi Data Petugas
                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12 xl:col-span-6">
                        <div>
                            <h2 class="font-normal text-xs mr-auto">Nama Petugas:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $user->name }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Email:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $user->email }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">NIP:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $user->nip }}</h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Jenis Kelamin:</h2>
                            <h2 class="text-lg font-normal mr-auto">{{ $user->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Personal Information -->
    </div>
    <a href="{{ route('users.index', [$role]) }}" class="text-base">
    <button class="btn btn-primary py-2 pl-2 pr-2">
            Kembali
        </button>
    </a>

</div>
@endsection