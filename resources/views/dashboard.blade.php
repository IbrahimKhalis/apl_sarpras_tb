@extends('mylayouts.main')

@push('css')
<style>
    .title {
        font-weight: 500;
    }

</style>
@endpush

@section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Dashboard Report
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    @if (Auth::user()->hasRole('super_admin'))
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                            title="12% Higher than last month"> 12% <i data-lucide="chevron-up"
                                                class="w-4 h-4 ml-0.5"></i> </div>
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
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                            title="22% Higher than last month"> 22% <i data-lucide="chevron-up"
                                                class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ $countRole }}</div>
                                <div class="text-base text-slate-500 mt-1">Roles</div>
                            </div>
                        </div>
                    </div>
                    @else
            
                    @endif
            
                </div>
                
            </div>
        </div>
    </div>
</div>


<!-- END: General Report -->
@endsection
