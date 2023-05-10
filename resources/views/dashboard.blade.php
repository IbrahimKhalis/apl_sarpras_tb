@extends('mylayouts.main')

@push('css')
<style>
    .title {
        font-weight: 500;
    }
</style>
@endpush

@section('content')
{{-- <div class="d-flex justify-content-between mb-3 align-items-center">
    <h4><strong>Dashboard</strong></h4>
</div>
@if (Auth::user()->hasRole('super_admin'))
<div class="row">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Jumlah Tahun Ajaran</h5>
                <p class="card-text" style="font-size: 2rem">{{ $countTahunAjaran }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Jumlah Role</h5>
                <p class="card-text" style="font-size: 2rem">{{ $countRole }}</p>
            </div>
        </div>
    </div>
</div>
@else
<div class="card mb-3" style="min-height: 17rem;overflow: auto;">
    <div class="card-body">
        <div class="title" style="display: flex; justify-content: space-between">
            <h4 class="card-title">Profile Sekolah</h4>
            @if (auth()->user()->can('edit_sekolah'))
            <x-ButtonCustom class="btn btn-warning btn-sm rounded" route="{{ route('sekolah.edit.own') }}">
                Edit
            </x-ButtonCustom>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-9">
                <table class="table table-responsive table-borderless">
                    <tr>
                        <td class="title">Nama Sekolah</td>
                        <td>:</td>
                        <td>{{ Auth::user()->sekolah->nama }}</td>
                    </tr>
                    <tr>
                        <td class="title">NPSN</td>
                        <td>:</td>
                        <td>{{ Auth::user()->sekolah->npsn }}</td>
                    </tr>
                    <tr>
                        <td class="title">Kepala Sekolah</td>
                        <td>:</td>
                        <td>{{ Auth::user()->sekolah->kepala_sekolah }}</td>
                    </tr>
                    <tr>
                        <td class="title">Alamat</td>
                        <td>:</td>
                        <td>{{ Auth::user()->sekolah->alamat }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-3">
                <img src="{{ Auth::user()->sekolah->logo != '/img/tutwuri.png' ? asset('storage/' . Auth::user()->sekolah->logo) : Auth::user()->sekolah->logo }}"
                    alt="" scale="1/1" style="width: 10rem; object-fit: cover; border-radius: 5px; display: block;">
            </div>
        </div>
    </div>
</div>
@endif --}}

<!-- BEGIN: General Report -->
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Dashboard Report
        </h2>
        <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-lucide="monitor" class="report-box__icon text-warning"></i> 
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $countTahunAjaran }}</div>
                    <div class="text-base text-slate-500 mt-1">Jumlah Tahun Ajaran</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-lucide="user" class="report-box__icon text-success"></i> 
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">{{ $countRole }}</div>
                    <div class="text-base text-slate-500 mt-1">Roles</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: General Report -->
@endsection