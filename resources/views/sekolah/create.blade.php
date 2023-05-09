@extends('mylayouts.main')

@section('content')
<div class="card">
    <form class="p-0 pt-3 m-0" action="{{ route('sekolah.store') }}" id="regForm" method="post" style=" width: 100%;"
        enctype="multipart/form-data">
        @csrf
        <div class="tab" id="sekolah">
            <h5>Data Sekolah</h5>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Sekolah</label>
                <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror  "
                    placeholder="Nama Sekolah" name="nama_sekolah" style="border-radius: 5px; width: 100%"
                    value="{{ old('nama_sekolah') }}" required>
                @error('nama_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="npsn" class="form-label">NPSN</label>
                <input type="number" class="form-control @error('npsn') is-invalid @enderror" placeholder="NPSN"
                    name="npsn" style="border-radius: 5px; width: 100%" value="{{ old('npsn') }}" required>
                @error('npsn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kepala_sekolah" class="form-label">Nama Kepala Sekolah</label>
                <input type="text" class="form-control @error('kepala_sekolah') is-invalid @enderror"
                    placeholder="Kepala Sekolah" name="kepala_sekolah" style="border-radius: 5px; width: 100%"
                    value="{{ old('kepala_sekolah') }}" required>
                @error('kepala_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang</label>
                <select name="jenjang" id="jenjang"
                    class="text-dark form-control @error('jenjang') is-invalid @enderror" style="border-radius: 5px;"
                    required>
                    <option value="">Pilih Jenjang</option>
                    <option value="sd" {{ old('jenjang')=='sd' ? 'selected' : '' }}>SD</option>
                    <option value="smp" {{ old('jenjang')=='smp' ? 'selected' : '' }}>SMP</option>
                    <option value="sma" {{ old('jenjang')=='sma' ? 'selected' : '' }}>SMA</option>
                    <option value="smk" {{ old('jenjang')=='smk' ? 'selected' : '' }}>SMK</option>
                </select>
                @error('jenjang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Logo (opsional)</label>
                <input class="form-control" type="file" id="formFile" name="logo" style="border-radius: 5px;">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan alamat"
                    name="alamat" value="{{ isset($data) ? $data->alamat : old('alamat') }}" style=" font-size: 15px;"
                    id="alamat">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <h5>Data user admin sekolah</h5>
            <div class="mb-3">
                <label for="name  " class="form-label">Nama admin sekolah</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama"
                    name="name" style="border-radius: 5px; width: 100%" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                    name="email" style="border-radius: 5px; width: 100%" value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="password" name="password" style="border-radius: 5px; width: 100%" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection