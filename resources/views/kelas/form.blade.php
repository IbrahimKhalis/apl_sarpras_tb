@extends('myLayouts.main')

@section('content')
    <!-- BEGIN: Vertical Form -->
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">
            {{ isset($data) ? 'Edit' : 'Tambah' }} Kelas
        </h2>
    </div>
    <form action="{{ isset($data) ? route('kelas.update', [$data->id]) : route('kelas.store') }}" method="post">
        @csrf
        @if (isset($data))
        @method('patch')
        @endif
        <div id="vertical-form" class="p-5">
            <div class="preview">
                <div>
                    <label for="vertical-form-1" class="form-label">Sekolah</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="sekolah_id"
                        value="{{ isset($data) ? $data->sekolah_id : old('sekolah_id') }}"
                        placeholder="Nama Sekolah">
                </div>
                <div class="mt-3">
                    <label for="vertical-form-2" class="form-label">Kelas</label>
                    <input id="vertical-form-2" type="text" class="form-control" name="nama"
                        value="{{ isset($data) ? $data->nama : old('nama') }}" placeholder="Kelas">
                </div>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                <a href="{{ route('kelas.index') }}" class="btn px-5 ml-3">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
<!-- END: Vertical Form -->
@endsection