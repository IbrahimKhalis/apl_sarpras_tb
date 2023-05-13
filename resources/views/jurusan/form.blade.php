@extends('mylayouts.main')

@push('css')
<style>
    .title {
        font-weight: 500;
    }

</style>
@endpush

@section('content')


{{-- <form action="{{ isset($data) ? route('jurusan.update', [$data->id]) : route('jurusan.store') }}" method="POST">
@csrf
@if (isset($data))
@method('patch')
@endif
<input type="text" name="nama_jurusan" value="{{ isset($data) ? $data->nama_jurusan : old('nama_jurusan') }}"
    placeholder="Nama Jurusan">
<input type="text" name="nama_kaprog" value="{{ isset($data) ? $data->nama_kaprog : old('nama_kaprog') }}"
    placeholder="Nama Kaprog">
<button type="submit">Kirim</button>
</form> --}}
{{-- <div class="card">
    <div class="card-body">
        <form action="{{ isset($data) ? route('jurusan.update', [$data->id]) : route('jurusan.store') }}"
method="POST">
@csrf
@if (isset($data))
@method('patch')
@endif
<div class="mb-3">
    <label for="tahun_awal" class="form-label">Jurusan</label>
    <input type="text" name="nama_jurusan" value="{{ isset($data) ? $data->nama_jurusan : old('nama_jurusan') }}"
        placeholder="Nama Jurusan">
</div>
<div class="mb-3">
    <label for="tahun_awal" class="form-label">Nama Kaprog(Kepala Program)</label>
    <input type="text" name="nama_kaprog" value="{{ isset($data) ? $data->nama_kaprog : old('nama_kaprog') }}"
        placeholder="Nama Kaprog">
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
</div> --}}

<!-- BEGIN: Vertical Form -->
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">
            Tambah Jurusan
        </h2>
    </div>
    <form action="{{ isset($data) ? route('jurusan.update', [$data->id]) : route('jurusan.store') }}" method="post">
        @csrf
        @if (isset($data))
        @method('patch')
        @endif
        <div id="vertical-form" class="p-5">
            <div class="preview">
                <div>
                    <label for="vertical-form-1" class="form-label">Jurusan</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="nama_jurusan"
                        value="{{ isset($data) ? $data->nama_jurusan : old('nama_jurusan') }}"
                        placeholder="Nama Jurusan">
                </div>
                <div class="mt-3">
                    <label for="vertical-form-2" class="form-label">Nama Kaprog</label>
                    <input id="vertical-form-2" type="text" class="form-control" name="nama_kaprog"
                        value="{{ isset($data) ? $data->nama_kaprog : old('nama_kaprog') }}" placeholder="Nama Kaprog">
                </div>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                <a href="{{ route('jurusan.index') }}" class="btn px-5 ml-3">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
<!-- END: Vertical Form -->
@endsection
