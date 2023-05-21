@extends('mylayouts.main')

{{-- @push('css')
<style>
    .title {
        font-weight: 500;
    }
</style>
@endpush

@section('content')
<form action="{{ isset($data) ? route('kategori.update', [$data->id]) : route('kategori.store') }}" method="POST">
    @csrf
    @if (isset($data))
    @method('patch')
    @endif
    <div>
        <input type="text" name="nama" value="{{ isset($data) ? $data->nama : old('nama') }}" placeholder="Nama">
    </div>
    <div>
        <select name="jenis" id="jenis" {{ isset($data) ? 'disabled' : '' }}>
            <option value="">Silahkan pilih</option>
            <option value="sarana" {{ isset($data) ? ($data->jenis == 'sarana' ? 'selected' : '') : '' }}>Sarana
            </option>
            <option value="prasarana" {{ isset($data) ? ($data->jenis == 'prasarana' ? 'selected' : '') : ''
                }}>Prasarana</option>
        </select>
    </div>
    <div class="parent-kode">
        @if (isset($data) && $data->jenis == 'sarana')
        <input type="text" name="kode" value="{{ isset($data) ? $data->kode : old('kode') }}" placeholder="Kode">
        @endif
    </div>
    <div>
        <p>Sub category</p>
        <button class="add-sub btn btn-primary" type="button">+</button>
    </div>
    @if (isset($data))
    <p>Telah disimpan</p>
    @foreach ($data->subcategory as $sub)
    <div class="sub-{{ $sub->id }}">
        <input type="text" placeholder="Sub" required value="{{ $sub->nama }}">
        <button class="btn btn-warning" type="button" onclick="updateAjax({{ $sub->id }})">edit</button>
        <button class="remove-sub btn btn-danger" type="button" onclick="removeAjax({{ $sub->id }})">-</button>
    </div>
    @endforeach
    <hr>
    @endif
    <div class="container-sub">
        <p>Baru</p>
    </div>
    <button type="submit">Kirim</button>
</form>
@endsection

@push('js')
<script>
    el = 1;
    $('.add-sub').on('click', function(e){
        e.preventDefault();
        $('.container-sub').append(`
            <div class="sub-${el}">
                <input type="text" name="sub[]" placeholder="Sub" required>
                <button class="remove-sub btn btn-danger" type="button" onclick="remove(${el})">-</button>
            </div>
        `)
        el++
    })

    function remove(id){
        $('.sub-' + id).remove()
    }

    function updateAjax(id){
        $.ajax({
            type: "POST",
            url: "{{ route('sub-kategori.update') }}" + `/${id}`,
            data: {
                nama: $('.sub-' + id + ' input').val(),
            },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {
                $('.sub-' + id + ' input').val(response.data.nama)
                showAlert('Berhasil diubah', 'success')
            },
            error: function (response) {
                console.log(response)
            },
        });
    }

    function removeAjax(id){
        $.ajax({
            type: "DELETE",
            url: "{{ route('sub-kategori.destroy') }}" + `/${id}`,
            data: {
                nama: $('.sub-' + id + ' input').val(),
            },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {
                $('.sub-' + id).remove()
                showAlert('Berhasil dihapus', 'success')
            },
            error: function (response) {
                console.log(response)
            },
        });
    }
</script>
@if (!isset($data))
<script>
    $('#jenis').on('change', function(e){
        if ($(this).val() == 'sarana') {
            $('.parent-kode').append('<input type="text" name="kode" placeholder="Kode">')
        }else if($(this).val() == 'prasarana' || !$(this).val()){
            $('.parent-kode').empty();
        }
    })
</script> --}}
@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($data) ? 'Edit' : 'Tambah' }} Category
    </h2>
</div>
<div class="grid  gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <form action="{{ isset($data) ? route('kategori.update', [$data->id]) : route('kategori.store') }}" method="POST">
            @csrf
            @if (isset($data))
            @method('patch')
            @endif
        <div class="intro-y box p-5">
            <div>
                <label for="crud-form-1" class="form-label">Nama Kategori</label>
                <input id="crud-form-1" type="text" class="form-control w-full"  name="nama" value="{{ isset($data) ? $data->nama : old('nama') }}" placeholder="Nama">
            </div>
            <div class="mt-3">
                <label for="crud-form-2" class="form-label">Jenis</label>
                <select data-placeholder="Pilih Jenis Barangmu" class="tom-select w-full" name="jenis" id="jenis" {{ isset($data) ? 'disabled' : '' }}>
                    <option value="-" selected>Silahkan pilih</option>
                    <option value="sarana" {{ isset($data) ? ($data->jenis == 'sarana' ? 'selected' : '') : (old('jenis') == 'sarana' ? 'selected' : '')}}>Sarana
                    </option>
                    <option value="prasarana" {{ isset($data) ? ($data->jenis == 'prasarana' ? 'selected' : '') : (old('jenis') == 'prasarana' ? 'selected' : '')}}>Prasarana</option>
                </select>
                </select>
            </div>
            <div class="parent-kode mt-3">
                @if (isset($data) && $data->jenis == 'sarana')
                <input type="text" class="form-control" name="kode" value="{{ isset($data) ? $data->kode : old('kode') }}" placeholder="Kode">
                @endif
            </div>
            <div>
                <div class="mt-5">
                    <p>Sub category</p>
                </div>
                <div class="mt-5">
                    <button class="add-sub btn btn-primary" type="button">Tambah Sub Category</button>
                </div>
            </div>
            @if (isset($data))
            @foreach ($data->subcategory as $sub)
            <div class="sub-{{ $sub->id }} mt-5">
                <input id="crud-form-1" type="text" class="form-control w-full mb-5" placeholder="Sub" required value="{{ $sub->nama }}">
                <button class="btn btn-warning" type="button" onclick="updateAjax({{ $sub->id }})">edit</button>
                <button class="remove-sub btn btn-danger" type="button" onclick="removeAjax({{ $sub->id }})">Hapus</button>
            </div>
            @endforeach
            @endif

            <div class="mt-5 mb-5">
                <div class="container-sub"></div>
            </div>
            
            <div class="text-right mt-5">
                <a href="{{ route('kategori.index') }}">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </a>
                <button class="btn btn-primary w-24" type="submit">Save</button>
            </div>
        </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>

@push('js')
<script>
    el = 1;
    $('.add-sub').on('click', function(e){
        e.preventDefault();
        $('.container-sub').append(`
            <div class="sub-${el}">
                <input id="crud-form-1" type="text" class="form-control w-full mb-5" name="sub[]" placeholder="Sub" required>
                <button class="remove-sub btn btn-danger  w-24 mr-1 mb-2" type="button" onclick="remove(${el})">Hapus</button>
                <br>
            </div>
        `)
        el++
    })

    function remove(id){
        $('.sub-' + id).remove()
    }

    function updateAjax(id){
        $.ajax({
            type: "POST",
            url: "{{ route('sub-kategori.update') }}" + `/${id}`,
            data: {
                nama: $('.sub-' + id + ' input').val(),
            },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {
                $('.sub-' + id + ' input').val(response.data.nama)
                showAlert('Berhasil diubah', 'success')
            },
            error: function (response) {
                console.log(response)
            },
        });
    }

    function removeAjax(id){
        $.ajax({
            type: "DELETE",
            url: "{{ route('sub-kategori.destroy') }}" + `/${id}`,
            data: {
                nama: $('.sub-' + id + ' input').val(),
            },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {
                $('.sub-' + id).remove()
                showAlert('Berhasil dihapus', 'success')
            },
            error: function (response) {
                console.log(response)
            },
        });
    }
</script>
@if (!isset($data))
<script>
    $('#jenis').on('change', function(e){
        if ($(this).val() == 'sarana') {
            $('.parent-kode').append('<input id="crud-form-1" type="text" class="form-control w-full" name="kode" placeholder="Kode">')
        }else if($(this).val() == 'prasarana' || !$(this).val()){
            $('.parent-kode').empty();
        }
    })
</script> 
@endif 
@endpush
@endsection

