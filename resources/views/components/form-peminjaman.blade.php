{{-- @dd($update) --}}
<div class="container-parent">
    @if ($page == 'public' || (count($update) > 0))
    <div class="mt-3">
        <div class="col-md-12">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ (count($update) > 0) ? $update['nama'] : old('nama') }}">
        </div>
    </div>
    <div class="mt-3">
        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email"
                value="{{ (count($update) > 0) ? $update['email'] : old('email') }}">
        </div>
    </div>
    @endif
    <div class="mt-3">
        <div class="col-md-12">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas" class="w-full" id="kelas">
                <option value="">Pilih Kelas</option>
                @if ($page == 'admin')
                @foreach ($kelas as $row)
                <option value="{{ $row->id }}" {{ (count($update)> 0) ? ($update['kelas_id'] == $row->id ? 'selected' :
                    '') : '' }}>{{ $row->nama }}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="mt-3">
        <div class="col-md-12">
            <label for="jenis" class="form-label">Kategori Peminjaman</label>
            <select name="jenis" class="w-full" id="jenis" onchange="syncJenis()">
                <option value="">Pilih Kategori</option>
                <option value="sarana" {{ (count($update)> 0) ? ($update['jenis'] == 'sarana' ? 'selected' : '') : ''
                    }}>Sarana</option>
                <option value="prasarana" {{ (count($update)> 0) ? ($update['jenis'] == 'prasarana' ? 'selected' : '') :
                    '' }}>Prasarana</option>
            </select>
        </div>
    </div>
    <div class="mt-3">
        <div class="col-md-12">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori_id" class="w-full" id="kategori" onchange="syncKategori()">
                <option value="">Pilih Kategori</option>
            </select>
        </div>
    </div>
</div>
<template id="template-sub">
    <div class="mt-3 div-jml-peminjaman">
        <div class="col-md-12">
            <label for="jml_peminjaman" class="form-label">Jumlah Peminjaman</label>
            <input type="number" name="jml_peminjaman" id="jml_peminjaman" min="1" onkeyup="cek()"
                value="{{ count($update) > 0 ? $update['jml_peminjaman'] : '' }}">
        </div>
    </div>
    <div class="mt-3 div-subkategori">
        <div class="col-md-12">
            <label for="subkategori" class="form-label">Sub Kategori</label>
            <select name="sub_kategori_id" class="w-full" id="subkategori" onchange="sub()" {{ count($update) < 1
                ? 'disabled' : '' }}>
                <option value="">Pilih Sub Kategori</option>
            </select>
        </div>
    </div>
</template>

<template id="template-ruang">
    <div class="mt-3 div-ruang">
        <div class="col-md-12">
            <label for="ruang" class="form-label">Ruang</label>
            <select name="ruang_id" class="w-full" id="ruang" disabled>
                <option value="">Pilih Ruang</option>
            </select>
        </div>
    </div>
</template>
@if ($page == 'admin')
<script>
    identifier = '{{ encodeText(Auth::user()->sekolah_id) }}';
</script>
@endif