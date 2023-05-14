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
                                <div
                                    class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        <img class="rounded-md" alt="Photo Profile"
                                            src="" name="">
                                    </div>
                                    <div class="mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                        <input type="file" class="form-control form-control-lg" name="profil" id="foto_profil">
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
