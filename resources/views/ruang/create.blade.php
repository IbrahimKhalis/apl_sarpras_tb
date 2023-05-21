@extends('myLayouts.main')

@section('content')
{{-- <form action="{{ url('/ruang') }}" method="post">
    @csrf
    <label for="">nama</label>
    <input type="text" name="name">
    <label for="">kategori</label>
    <select name="kategori_id" id="">
        @foreach($kategoris as $kategori)
            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
        @endforeach
    </select>
    <select name="jurusan_id" id="">
        @foreach($datas as $jurusan)
            <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
        @endforeach
    </select>
    <label for="">status</label>
    <input type="checkbox" name="bisa_dipinjam">
    <button type="submit">Submit</button>
</form> --}}

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($data) ? 'Edit' : 'Tambah' }} Ruang
    </h2>
</div>
<div class="grid  gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <form action="{{ isset($data) ? route('ruang.update', [$data->id]) : route('ruang.store') }}" method="POST">
            @csrf
            @if (isset($data))
            @method('patch')
            @endif
        <div class="intro-y box p-5">
            <div>
                <label for="crud-form-1" class="form-label">Nama Ruang</label>
                <input id="crud-form-1" type="text" class="form-control w-full"  name="nama" value="{{ isset($data) ? $data->nama : old('nama') }}" placeholder="Nama">
            </div>
            <div class="mt-3">
                <label for="crud-form-2" class="form-label">Kategori</label>
                <select name="kategori_id" id="" class="tom-select w-full">
                    @foreach($kategoris as $kategori)
                        <option {{ isset($data) ? ($kategori->id == $data->kategori_id ? 'selected' : '') :'' }} value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
                </select>
            </div>
            <div class="mt-3">
                <label for="crud-form-2" class="form-label">Jurusan</label>
                <select name="jurusan_id" id="" class="tom-select w-full">
                    <option value="">Pilih Jurusan</option>
                    @foreach($datas as $jurusan)
                    <option {{ isset($data) ? ($jurusan->id == $data->jurusan_id ? 'selected' : '') :'' }} value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                    @endforeach
                </select>
                </select>
            </div>
            <div class="mt-3">
                <label for="crud-form-2" class="form-label">Bisa Dipinjam</label>
                <input type="checkbox" name="bisa_dipinjam" class="form-check-input">
            </div>
            <div class="text-right mt-5">
                <a href="{{ route('ruang.index') }}">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </a>
                <button class="btn btn-primary w-24" type="submit">Save</button>
            </div>
        </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>

@endsection