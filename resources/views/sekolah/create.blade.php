@extends('mylayouts.main')

@section('content')
{{-- <div class="card">
    <form class="p-0 pt-3 m-0" action="{{ route('sekolah.store') }}" id="regForm" method="post" style=" width: 100%;"
enctype="multipart/form-data">
@csrf
<div class="tab" id="sekolah">
    <h5 class="text-lg font-normal mr-auto py-3">Data Sekolah:</h5>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Sekolah</label>
        <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror  " placeholder="Nama Sekolah"
            name="nama_sekolah" style="border-radius: 5px; width: 100%" value="{{ old('nama_sekolah') }}" required>
        @error('nama_sekolah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="npsn" class="form-label">NPSN</label>
        <input type="number" class="form-control @error('npsn') is-invalid @enderror" placeholder="NPSN" name="npsn"
            style="border-radius: 5px; width: 100%" value="{{ old('npsn') }}" required>
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
        <select name="jenjang" id="jenjang" class="text-dark form-control @error('jenjang') is-invalid @enderror"
            style="border-radius: 5px;" required>
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
    <h5 class="text-lg font-normal mr-auto py-3">Data user admin sekolah:</h5>
    <div class="mb-3">
        <label for="name" class="form-label">Nama admin sekolah</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" name="name"
            style="border-radius: 5px; width: 100%" value="{{ old('name') }}" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email"
            style="border-radius: 5px; width: 100%" value="{{ old('email') }}" required>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password"
            name="password" style="border-radius: 5px; width: 100%" required>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<button type="submit" class="btn btn-primary">Tambah</button>
</form>
</div> --}}

<div class="card">
    <div class="card-body">
        <div class="grid gap-6">
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                <!-- BEGIN: Personal Information -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Tambah Sekolah
                        </h2>
                    </div>
                    <form class="p-5" action="{{ route('sekolah.store') }}" id="regForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <h5 class="text-lg font-normal mr-auto">Data Sekolah:</h5>
                                <div>
                                    <h2 class="font-normal text-xs mr-auto mt-3">Nama Sekolah:</h2>
                                    <input type="text"
                                        class="form-control @error('nama_sekolah') is-invalid @enderror  "
                                        placeholder="Nama Sekolah" name="nama_sekolah"
                                        style="border-radius: 5px; width: 100%" value="{{ old('nama_sekolah') }}"
                                        required>
                                    @error('nama_sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <h2 class="font-normal text-xs mr-auto mt-3">Kode Sekolah:</h2>
                                    <input type="text"
                                        class="form-control @error('kode') is-invalid @enderror  "
                                        placeholder="Kode Sekolah" name="kode"
                                        style="border-radius: 5px; width: 100%" value="{{ old('kode') }}"
                                        required>
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <h2 class="font-normal text-xs mr-auto">NPSN:</h2>
                                    <input type="number" class="form-control @error('npsn') is-invalid @enderror"
                                        placeholder="NPSN" name="npsn" style="border-radius: 5px; width: 100%"
                                        value="{{ old('npsn') }}" required>
                                    @error('npsn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <h2 class="font-normal text-xs mr-auto">Kepala Sekolah:</h2>
                                    <input type="text"
                                        class="form-control @error('kepala_sekolah') is-invalid @enderror"
                                        placeholder="Kepala Sekolah" name="kepala_sekolah"
                                        style="border-radius: 5px; width: 100%" value="{{ old('kepala_sekolah') }}"
                                        required>
                                    @error('kepala_sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <h2 class="font-normal text-xs mr-auto">Jenjang:</h2>
                                    <select name="jenjang" id="jenjang"
                                        class="text-dark form-control @error('jenjang') is-invalid @enderror"
                                        style="border-radius: 5px;" required>
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
                                <div class="mt-3">
                                    <h2 class="font-normal text-xs mr-auto">Alamat:</h2>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Masukan alamat" name="alamat"
                                        value="{{ isset($data) ? $data->alamat : old('alamat') }}"
                                        style=" font-size: 15px;" id="alamat">
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <h5 class="text-lg font-normal mr-auto">Data user admin sekolah:</h5>
                                <div class="mt-3">
                                    <h2 class="font-normal text-xs mr-auto">Nama Admin Sekolah:</h2>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama" name="name" style="border-radius: 5px; width: 100%"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <h2 class="font-normal text-xs mr-auto">Email:</h2>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" name="email" style="border-radius: 5px; width: 100%"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <h2 class="font-normal text-xs mr-auto">Password:</h2>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="password" name="password" style="border-radius: 5px; width: 100%"
                                        required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <h2 class="font-normal text-xs mr-auto">Logo Sekolah:</h2>
                                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                        <div class="flex flex-col flex-grow mb-3">
                                            <div x-data="{ files: null }" id="FileUpload"
                                                class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                                                <input type="file" multiple
                                                    class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                                    name="log" id="formFile" value=""
                                                    x-on:change="files = $event.target.files; console.log($event.target.files);"
                                                    x-on:dragover="$el.classList.add('active')"
                                                    x-on:dragleave="$el.classList.remove('active')"
                                                    x-on:drop="$el.classList.remove('active')">
                                                <template x-if="files !== null">
                                                    <div class="flex flex-col space-y-1">
                                                        <template
                                                            x-for="(_,index) in Array.from({ length: files.length })">
                                                            <div class="flex flex-row items-center space-x-2">
                                                                <template x-if="files[index].type.includes('audio/')"><i
                                                                        class="far fa-file-audio fa-fw"></i></template>
                                                                <template
                                                                    x-if="files[index].type.includes('application/')"><i
                                                                        class="far fa-file-alt fa-fw"></i></template>
                                                                <template x-if="files[index].type.includes('image/')"><i
                                                                        class="far fa-file-image fa-fw"></i></template>
                                                                <template x-if="files[index].type.includes('video/')"><i
                                                                        class="far fa-file-video fa-fw"></i></template>
                                                                <span class="font-medium text-gray-900"
                                                                    x-text="files[index].name">Uploading</span>
                                                                <span class="text-xs self-end text-gray-500"
                                                                    x-text="filesize(files[index].size)">...</span>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </template>
                                                <template x-if="files === null">
                                                    <div class="flex flex-col space-y-2 items-center justify-center">
                                                        <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                                        <p class="text-gray-700">Pilih Logo Sekolah</p>
                                                        <a href="javascript:void(0)"
                                                            class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-red-700">Select
                                                            a file</a>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right mt-5">
                                        <a href="{{ route('sekolah.index') }}">
                                            <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                        </a>
                                        <button class="btn btn-primary w-24" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END: Personal Information -->
            </div>
        </div>
    </div>
</div>
@endsection
