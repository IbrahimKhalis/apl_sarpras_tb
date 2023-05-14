@extends('mylayouts.main')

@push('css')
    <style>
        .title {
            font-weight: 500;
        }
    </style>
@endpush

@section('content')
    <form action="{{ isset($data) ? route('produk.update', [$data->id]) : route('produk.store') }}" method="POST">
        @csrf
        @if (isset($data))
            @method('patch')
        @endif
        <div>
            <label for="">kategori</label>
            <select name="kategori_id" id="kategori">
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">sub</label>
            <select name="sub_kategori_id" id="subkategori" disabled>
                <option value="">Pilih Sub Kategori</option>
                @foreach ($subcategories as $subcategorie)
                    <option value="{{ $subcategorie->id }}">{{ $subcategorie->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">jurusan</label>
            <select name="jurusan_id" id="">
                <option value="">Pilih Jurusan</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">nama</label>
            <input type="text" name="nama">
        </div>
        <div>
            <label for="">merek</label>
            <input type="text" name="merek">
        </div>
        <div>
            <label for="">Kondisi</label>
            <select name="kondisi" id="">
                <option value="">Pilih kondisi</option>
                <option value="B">Baik</option>
                <option value="KB">Kurang Baik</option>
                <option value="RB">Rusak Berat</option>
            </select>
        </div>
        <div>
            <label for="">keterangan Produk</label>
            <textarea name="ket_produk" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="">keterangan Kondisi</label>
            <textarea name="ket_kondisi" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="">jumlah</label>
            <input type="number" name="jumlah">
        </div>
        <button type="submit">Kirim</button>
    </form>

    @push('js')
        <script>
            $('#kategori').change(function(e) {
                e.preventDefault();
                !this.value ? $('#subkategori').attr('disabled', true) : $('#subkategori').attr('disabled', false);
                $('#subkategori').html(`
                    <option value="">Pilih Sub Kategori</option>
                `);
                getSubcategories(this.value);
            });

            function getSubcategories(value) {
                if (value) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('get.sub') }}" + `/${value}`,
                        success: function(response) {
                            items = response.datas
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
            }
        </script>
    @endpush
@endsection
