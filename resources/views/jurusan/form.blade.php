@extends('mylayouts.main')

@push('css')
<style>
    .title {
        font-weight: 500;
    }
</style>
@endpush

@section('content')
<form action="{{ route('jurusan.store') }}" method="POST">
    @csrf
    @method("post")
    <input type="text" name="nama_jurusan">
    <input type="text" name="nama_kaprog">
    <button type="submit">Kirim</button>
</form>
@endsection