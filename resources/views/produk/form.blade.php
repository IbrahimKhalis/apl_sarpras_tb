@extends('mylayouts.main')

@push('css')
{{-- <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" /> --}}
<style>
    .title {
        font-weight: 500;
    }
</style>
@endpush

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($data) ? 'Edit' : 'Tambah' }} Product
    </h2>
</div>
<div class="grid gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box p-5">
            <form action="{{ isset($data) ? route('produk.update', [$data->id]) : route('produk.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($data))
                @method('patch')
                @endif
                <div>
                    <label for="crud-form-1" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control w-full" type="text" name="nama"
                        value="{{ isset($data) ? ($data->nama) : old('nama') }}" placeholder="Masukkan Nama Produk">
                </div>
                @if (!isset($data))
                <div class="div-name-increment">
                    <label for="">Nama Produk increment?</label>
                    <input type="checkbox" name="name_increment" class="check-name-increment">
                </div>
                @endif
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Merek</label>
                    <input type="text" class="form-control w-full" name="merek"
                        value="{{ isset($data) ? ($data->merek) : old('merek') }}"
                        placeholder="Masukkan Merek Produkmu">
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Kategori</label>
                    <select data-placeholder="Pilih Kategori Produkmu" class="tom-select w-full" name="kategori_id"
                        id="kategori">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ isset($data) ? ($data->kategori_id == $kategori->id ?
                            'selected' : '') : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Sub Kategori</label>
                    <select name="sub_kategori_id" id="subkategori" class=" w-full " class="form-control">
                        <option value="">Pilih Sub Kategori</option>
                        @if (isset($subcategories))
                        @foreach ($subcategories as $subcategorie)
                        <option value="{{ $subcategorie->id }}" {{ isset($data) ? ($data->sub_kategori_id ==
                            $subcategorie->id ? 'selected' : '') : '' }} clas>{{ $subcategorie->nama }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Kondisi</label>
                    <select data-placeholder="Pilih Kondisi Dari Produkmu" class="tom-select w-full" name="kondisi"
                        id="">
                        <option value="">Pilih kondisi</option>
                        <option value="B" {{ isset($data) ? ($data->kondisi == 'B' ? 'selected' : '') : '' }}>Baik
                        </option>
                        <option value="KB" {{ isset($data) ? ($data->kondisi == 'KB' ? 'selected' : '') : '' }}>Kurang
                            Baik</option>
                        <option value="RB" {{ isset($data) ? ($data->kondisi == 'RB' ? 'selected' : '') : '' }}>Rusak
                            Berat</option>
                    </select>
                </div>
                @if (!isset($data))
                <div class="mt-3">
                    <label class="form-label">Jumlah</label>
                    <div class="sm:grid grid-cols-3 gap-2">
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">Unit</div>
                            <input type="number" name="jumlah" class="form-control"
                                placeholder="Masukkan Jumlah Unit Barang " aria-describedby="input-group-3">
                        </div>
                    </div>
                </div>
                @endif
                <div class="flex flex-col mt-5">
                    <label for="">Keterangan Produk</label>
                    <textarea class="form-control mt-3" name="ket_produk" id="" cols="10"
                        rows="6">{{ isset($data) ? ($data->ket_produk) : old('ket_produk') }}</textarea>
                </div>
                <div class="flex flex-col mt-5">
                    <label for="">Keterangan Kondisi Produk</label>
                    <textarea class="form-control mt-3" name="ket_kondisi" id="" cols="10"
                        rows="6">{{ isset($data) ? ($data->ket_kondisi) : old('ket_kondisi') }}</textarea>
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Sekali Pakai</label>
                    <input type="checkbox" class="form-control" name="sekali_pakai">
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Foto</label>
                    <input type="file" class="form-control w-full" name="fotos[]" multiple accept="image/*">
                </div>
                @if (isset($data))
                @foreach ($data->fotos as $foto)
                <div class="div-foto-{{ $foto->id }}">
                    <img src="{{ asset('storage/' . $foto->file) }}" alt="">
                    <button type="button" onclick="hapusFoto({{ $foto->id }})">Hapus</button>
                </div>
                @endforeach
                @endif
                {{-- <div class="mt-3">
                    <label class="form-label">Upload Image</label>
                    <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                            <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a
                                file</span> or drag and drop
                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0 cursor-pointer"
                                id="images" name="fotos[]" multiple accept="image/*">
                        </div>
                    </div>
                </div> --}}
                {{-- @error('images')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <a id="single_image" data-fancybox="gallery"
                    class="images-preview-div grid grid-cols-3gap-3 mt-3 object-cover"
                    style="margin-top: 2rem; margin-bottom: 2rem; width: 2rem"></a> --}}
        </div>
        <div class="text-right mt-5">
            <a href="">
                <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
            </a>
            <button type="submit" class="btn btn-primary w-24">Save</button>
        </div>
        </form>
    </div>
</div>
</div>

@push('js')
<script>
    $(function() {
// Multiple images preview with JavaScript
    var previewImages = function(input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#images').on('change', function() {
        previewImages(this, 'a.images-preview-div');
    });
});
</script>
<script>
    $('#kategori').change(function (e) {
        if ($(this).val()) {
            $.ajax({
                type: "get",
                url: "{{ route('get.sub') }}" + `/${$(this).val()}`,
                success: function (response) {
                    items = response.datas
                    $('#subkategori').empty()
                    if (response.datas) {
                        items.forEach(item => {
                            $('#subkategori').append(`
                                <option value="${item.id}">${item.nama}</option>
                            `);
                        });
                    }
                }
            });
        }
    });
</script>
@if (!isset($data))
<script>
    $('.check-name-increment').on('change', function () {
        if ($(this).is(':checked')) {
            $('.div-name-increment').append('<input type="number" name="start_increment" placeholder="mulai">')
        } else {
            $('.div-name-increment input[type="number"]').remove()
        }
    })

</script>
@endif
@if (isset($data))
<script>
    function hapusFoto(id) {
        $.ajax({
            type: "DELETE",
            url: "{{ route('produk.hapus_foto') }}",
            data: {
                'produk_id': '{{ $data->id }}',
                'foto_id': id
            },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {
                $('.div-foto-' + id).remove();
                showAlert('Berhasil dihapus', 'success')
            },
            error: function (response) {
                console.log(response)
            },
        });
    }

</script>
@endif
@endpush
@endsection