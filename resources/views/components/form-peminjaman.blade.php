{{-- @dd($update) --}}
<div class="container-parent">
    <div class="mt-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control ml-4" style="width: 20rem;"  name="nama" id="nama" value="{{ (count($update) > 0) ? $update['nama'] : old('nama') }}">
    </div>
    <div class="mt-3">
        <div>
            <label for="email" class="form-label">Email</label>
            <input  class="form-control ml-5" style="width: 20rem;" type="email" name="email" id="email"
            value="{{ (count($update) > 0) ? $update['email'] : old('email') }}">
        </div>
    </div>
    <div class="mt-3">
        <div class="col-md-12">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas" class="tom-select w-full" id="kelas">
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
            <select name="jenis" class="tom-select w-full" id="jenis" onchange="syncKategori()">
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
            <select name="kategori_id" class="tom-select w-full" id="kategori" onchange="syncSub()">
                <option value="">Pilih Kategori</option>
            </select>
        </div>
    </div>
</div>
<template id="template-sub">
    <div class="mt-3">
        <label class="form-label">Jumlah Peminjaman</label>
        <div class="sm:grid grid-cols-3 gap-2">
            <div class="input-group">
                <div id="input-group-3" class="input-group-text">Unit</div>
                <input type="number" name="jml_peminjaman" id="jml_peminjaman" class="form-control form-control-rounded" min="1" onkeyup="cek()"
                value="{{ count($update) > 0 ? $update['jml_peminjaman'] : '' }}">
            </div>
        </div>
    </div>
   
    <div class="mt-3 div-subkategori">
            <label for="subkategori" class="form-label">Sub Kategori</label>
            <select name="sub_kategori_id" class="form-select w-full" id="subkategori" onchange="syncProduk()" >
                <option value="">Pilih Sub Kategori</option>
            </select>
    </div>
    @if ($page == 'admin')
    <div class="mt-3 div-produk">
        <div class="col-md-12">
            <label for="produk" class="form-label">Produk</label>
            <select name="produk_id[]" class="form-select w-full" id="produk" multiple>
                <option value="">Pilih Produk</option>
            </select>
        </div>
    </div>
    @endif
</template>

<template id="template-ruang">
    <div class="mt-3 div-ruang">
        <div class="col-md-12">
            <label for="ruang" class="form-label">Ruang</label>
            <select name="ruang_id" class="form-select w-full" id="ruang" disabled onchange="syncRuang()">
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