@extends('myLayouts.main')

@section('content')
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">
            Peminjaman
        </h2>
        @can('edit_peminjaman')
        <a href="{{ route('peminjamans.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
        @endcan
    </div>
    
</div>
@endsection