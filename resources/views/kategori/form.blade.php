@extends('mylayouts.main')

@push('css')
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
</script>
@endif
@endpush