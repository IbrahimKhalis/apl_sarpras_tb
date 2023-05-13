@extends('mylayouts.main')

@push('css')
<style>
    .title {
        font-weight: 500;
    }
</style>
@endpush

@section('content')
<form action="{{ isset($data) ? route('produk.update', [$data->id]) : route('produk.store') }}" method="POST">
    @csrf
    @if (isset($data))
        @method('patch')
    @endif
    <div>
        <label for="">kategori</label>
        <select name="kategori_id" id="">
            <option value="">Pilih Kategori</option>
            @foreach ($kategoris as $kategori)
            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="">sub</label>
        <select name="subkategori_id" id="" disabled>
            <option value="">Pilih Sub Kategori</option>
        </select>
    </div>
    <div>
        <label for="">nama</label>
        <input type="text" name="nama">
    </div>
    <div>
        <label for="">merek</label>
        <input type="text" name="merek">
    </div>
    <div>
        <label for="">Kondisi</label>
        <select name="kondisi" id="">
            <option value="">Pilih kondisi</option>
            <option value="B">Baik</option>
            <option value="KB">Kurang Baik</option>
            <option value="RB">Rusak Berat</option>
        </select>
    </div>
    <div>
        <label for="">keterangan Produk</label>
        <textarea name="ket_produk" id="" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="">keterangan Kondisi</label>
        <textarea name="ket_kondisi" id="" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">Kirim</button>
</form>
@endsection