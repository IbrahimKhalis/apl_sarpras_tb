@extends('mylayouts.main')

@push('css')
<style>
    .title {
        font-weight: 500;
    }
</style>
@endpush

@section('content')
<form action="{{ isset($data) ? route('jurusan.update', [$data->id]) : route('jurusan.store') }}" method="POST">
    @csrf
    @if (isset($data))
        @method('patch')
    @endif
    <input type="text" name="nama_jurusan" value="{{ isset($data) ? $data->nama_jurusan : old('nama_jurusan') }}" placeholder="Nama Jurusan">
    <input type="text" name="nama_kaprog" value="{{ isset($data) ? $data->nama_kaprog : old('nama_kaprog') }}" placeholder="Nama Kaprog">
    <button type="submit">Kirim</button>
</form>
@endsection