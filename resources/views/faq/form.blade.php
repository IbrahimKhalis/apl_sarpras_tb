@extends('mylayouts.main')

@push('css')
<style>
    .title {
        font-weight: 500;
    }
</style>
@endpush

@section('content')
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">
            {{ isset($data) ? 'Edit' : 'Tambah' }} FAQ
        </h2>
    </div>
    <form action="{{ isset($data) ? route('faq.update', [$data->id]) : route('faq.store') }}" method="post">
        @csrf
        @if (isset($data))
        @method('patch')
        @endif
        <div id="vertical-form" class="p-5">
            <div class="preview">
                <div>
                    <label for="vertical-form-1" class="form-label">Judul</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="judul"
                        value="{{ isset($data) ? $data->judul : old('judul') }}" placeholder="Judul">
                </div>
                <div class="flex flex-col mt-5">
                    <label for="konten">Konten</label>
                    <textarea class="form-control mt-3 p-3" name="konten" id="konten" cols="10"
                        rows="6">{{ isset($data) ? ($data->konten) : old('konten') }}</textarea>
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