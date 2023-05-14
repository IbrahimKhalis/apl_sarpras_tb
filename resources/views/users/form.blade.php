{{-- <form class="mt-3"
    action="{{ (isset($data)) ? route('users.update', ['id' => $data->id   , 'role' => $role]) : route('users.store', [$role]) }}"
method="POST" enctype="multipart/form-data">
@if (isset($data))
@method('patch')
@endif
@csrf
@include('mypartials.tahunajaran')
<div class="mb-3">
    <label for="name" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama" name="name"
        value="{{ isset($data) ? $data->name : old('name') }}" style=" font-size: 15px; height: 6.5vh;" id="name">
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="nip" class="form-label">NIP</label>
    <input type="number" class="form-control @error('nip') is-invalid @enderror" placeholder="Masukan NIP" name="nip"
        value="{{ isset($data) ? $data->nip : old('nip') }}" style=" font-size: 15px; height: 6.5vh;" id="nip">
    @error('nip')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email"
        name="email" value="{{ isset($data) ? $data->email : old('email') }}" style=" font-size: 15px; height: 6.5vh;"
        id="email">
    @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="jk" class="form-label">Jenis Kelamin</label>
    <select class="form-select @error('jk') is-invalid @enderror" aria-label="Default select example" name="jk"
        value="{{ old('jk') }}" style=" font-size: 15px; height: 6.5vh;" id="jk">
        <option value="L" {{ isset($data) ? ($data->name == 'L' ? 'selected' : '') : (old('name') == 'L' ?
                'selected' : '') }}>Laki-laki</option>
        <option value="P" {{ isset($data) ? ($data->name == 'P' ? 'selected' : '') : (old('name') == 'P' ?
                'selected' : '') }}>Perempuan</option>
    </select>
    @error('jk')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
@if (!isset($data))
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="*123456*"
        style=" font-size: 15px; height: 6.5vh;" id="password" disabled>
</div>
@endif

<div class="mb-3">
    <label for="foto_profil" class="form-label">Foto Profil</label>
    <div class="row">
        <div class="col-md">
            <input type="file" class="form-control form-control-lg" name="profil" id="foto_profil">
        </div>
        @if (isset($data) && $data->profil != '/img/profil.png')
        <div class="col-md-3">
            <a href="{{ asset('storage/' . $data->profil) }}" class="btn btn-primary" target="_blank">Show Photo
                Uploaded</a>
        </div>
        @endif
    </div>
</div>
<button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form> --}}

<div class="grid gap-6">
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <!-- BEGIN: Personal Information -->
        <div class="intro-y box mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Tambah Data {{$role}}
                </h2>
            </div>
            <form class="p-5"
                action="{{ (isset($data)) ? route('users.update', ['id' => $data->id   , 'role' => $role]) : route('users.store', [$role]) }}"
                method="POST" enctype="multipart/form-data">
                @if (isset($data))
                @method('patch')
                @endif
                @csrf
                @include('mypartials.tahunajaran')
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12 xl:col-span-6">
                        <div>
                            <h2 class="font-normal text-xs mr-auto">Nama Lengkap:</h2>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukan Nama" name="name"
                                value="{{ isset($data) ? $data->name : old('name') }}"
                                style=" font-size: 15px; height: 6.5vh;" id="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">NIP:</h2>
                            <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                placeholder="Masukan NIP" name="nip"
                                value="{{ isset($data) ? $data->nip : old('nip') }}"
                                style=" font-size: 15px; height: 6.5vh;" id="nip">
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Email:</h2>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukan Email" name="email"
                                value="{{ isset($data) ? $data->email : old('email') }}"
                                style=" font-size: 15px; height: 6.5vh;" id="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <h2 class="font-normal text-xs mr-auto">Jenis Kelamin:</h2>
                            <select class="form-select @error('jk') is-invalid @enderror"
                                aria-label="Default select example" name="jk" value="{{ old('jk') }}"
                                style=" font-size: 15px; height: 6.5vh;" id="jk">
                                <option value="L" {{ isset($data) ? ($data->name == 'L' ? 'selected' : '') : (old('name') == 'L' ?
                                'selected' : '') }}>Laki-laki</option>
                                <option value="P" {{ isset($data) ? ($data->name == 'P' ? 'selected' : '') : (old('name') == 'P' ?
                                'selected' : '') }}>Perempuan</option>
                            </select>
                            @error('jk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3 xl:mt-0">
                            <h2 class="font-normal text-xs mr-auto">Foto Profile:</h2>
                            <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                {{-- <div
                                    class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    </div>
                                    <div class="mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                        <input type="file" class="form-control form-control-lg" name="profil" id="foto_profil">
                                    </div>
                                </div> --}}
                                <div class="flex flex-col flex-grow mb-3">
                                    <div x-data="{ files: null }" id="FileUpload" class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
                                        <input type="file" multiple
                                               class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0" name="profil" id="foto_profil" value=""
                                               x-on:change="files = $event.target.files; console.log($event.target.files);"
                                               x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')" required>
                                        <template x-if="files !== null">
                                            <div class="flex flex-col space-y-1">
                                                <template x-for="(_,index) in Array.from({ length: files.length })">
                                                    <div class="flex flex-row items-center space-x-2">
                                                        <template x-if="files[index].type.includes('audio/')"><i class="far fa-file-audio fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('application/')"><i class="far fa-file-alt fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                                                        <template x-if="files[index].type.includes('video/')"><i class="far fa-file-video fa-fw"></i></template>
                                                        <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                                                        <span class="text-xs self-end text-gray-500" x-text="filesize(files[index].size)">...</span>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>
                                        <template x-if="files === null">
                                            <div class="flex flex-col space-y-2 items-center justify-center">
                                                <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                                                <p class="text-gray-700">Choose Profile Picture</p>
                                                <a href="javascript:void(0)" class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-red-700">Select a file</a>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6 mt-5 flex">
                        <div class="mt-3 xl:mt-0">
                            <button type="submit" class="btn btn-primary px-5 mr-5">Submit</button>
                        </div>
                        <a href="{{ route('users.index', [$role]) }}" class="btn px-5">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <!-- END: Personal Information -->
    </div>
</div>
