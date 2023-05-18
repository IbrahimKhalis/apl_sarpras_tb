@extends('mylayouts.main')

@push('css')
    <style>
        .title {
            font-weight: 500;
        }
    </style>
@endpush

@section('content')
    {{-- <form action="{{ isset($data) ? route('produk.update', [$data->id]) : route('produk.store') }}" method="POST">
        @csrf
        @if (isset($data))
            @method('patch')
        @endif
        <div>
            <label for="">kategori</label>
            <select name="kategori_id" id="kategori">
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ isset($data) ? ($data->kategori_id == $kategori->id ? 'selected' : '') : '' }}>{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">sub</label>
            <select name="sub_kategori_id" id="subkategori" {{ !isset($data) ? 'disabled' : '' }}>
                <option value="">Pilih Sub Kategori</option>
                @foreach ($subcategories as $subcategorie)
                    <option value="{{ $subcategorie->id }}" {{ isset($data) ? ($data->sub_kategori_id == $subcategorie->id ? 'selected' : '') : '' }}>{{ $subcategorie->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">jurusan</label>
            <select name="jurusan_id" id="">
                <option value="">Pilih Jurusan</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ isset($data) ? ($data->jurusan_id == $jurusan->id ? 'selected' : '') : '' }}>{{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">nama</label>
            <input type="text" name="nama" value="{{ isset($data) ? ($data->nama) : old('nama') }}">
        </div>
        <div>
            <label for="">merek</label>
            <input type="text" name="merek" value="{{ isset($data) ? ($data->merek) : old('merek') }}">
        </div>
        <div>
            <label for="">Kondisi</label>
            <select name="kondisi" id="">
                <option value="">Pilih kondisi</option>
                <option value="B" {{ isset($data) ? ($data->kondisi == 'B' ? 'selected' : '') : '' }}>Baik</option>
                <option value="KB" {{ isset($data) ? ($data->kondisi == 'KB' ? 'selected' : '') : '' }}>Kurang Baik</option>
                <option value="RB" {{ isset($data) ? ($data->kondisi == 'RB' ? 'selected' : '') : '' }}>Rusak Berat</option>
            </select>
        </div>
        <div>
            <label for="">keterangan Produk</label>
            <textarea name="ket_produk" id="" cols="30" rows="10">{{ isset($data) ? ($data->ket_produk) : old('ket_produk') }}</textarea>
        </div>
        <div>
            <label for="">keterangan Kondisi</label>
            <textarea name="ket_kondisi" id="" cols="30" rows="10">{{ isset($data) ? ($data->ket_kondisi) : old('ket_kondisi') }}</textarea>
        </div>
        @if (!isset($data))
        <div>
            <label for="">jumlah</label>
            <input type="number" name="jumlah">
        </div>
        @endif
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
    @endpush --}}


    
                                    
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Create Product
        </h2>
    </div>
    <div class="grid gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ isset($data) ? route('produk.update', [$data->id]) : route('produk.store') }}" method="POST">
            @csrf
            @if (isset($data))
             @method('patch')
            @endif
            
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control w-full"  type="text" name="nama" value="{{ isset($data) ? ($data->nama) : old('nama') }}" placeholder="Masukkan Nama Produk">
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Merek</label>
                    <input type="text" class="form-control w-full"  name="merek" value="{{ isset($data) ? ($data->merek) : old('merek') }}" placeholder="Masukkan Merek Produkmu">
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Kategori</label>
                    <select data-placeholder="Pilih Kategori Produkmu" class="tom-select w-full" name="kategori_id" id="kategori">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ isset($data) ? ($data->kategori_id == $kategori->id ? 'selected' : '') : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Sub Kategori</label>
                    <select name="sub_kategori_id" id="subkategori" {{ !isset($data) ? 'disabled' : '' }}  class=" w-full ">
                        <option value="">Pilih Sub Kategori</option>
                        @foreach ($subcategories as $subcategorie)
                            <option value="{{ $subcategorie->id }}" {{ isset($data) ? ($data->sub_kategori_id == $subcategorie->id ? 'selected' : '') : '' }}>{{ $subcategorie->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Jurusan</label>
                    <select data-placeholder="Pilih Jurusan Dari Produk ini" class="tom-select w-full" name="jurusan_id" id="">
                        <option value="">Piilih Jurusan Yang Sesuai Produkmu</option>
                        @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ isset($data) ? ($data->jurusan_id == $jurusan->id ? 'selected' : '') : '' }}>{{ $jurusan->nama_jurusan }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Kondisi</label>
                    
                    <select data-placeholder="Pilih Kondisi Dari Produkmu" class="tom-select w-full" name="kondisi" id="">
                            <option value="">Pilih kondisi</option>
                            <option value="B" {{ isset($data) ? ($data->kondisi == 'B' ? 'selected' : '') : '' }}>Baik</option>
                            <option value="KB" {{ isset($data) ? ($data->kondisi == 'KB' ? 'selected' : '') : '' }}>Kurang Baik</option>
                            <option value="RB" {{ isset($data) ? ($data->kondisi == 'RB' ? 'selected' : '') : '' }}>Rusak Berat</option>
                    </select>
                </div>
                
               
                <div class="mt-3">
                    <label class="form-label">Jumlah</label>
                    <div class="sm:grid grid-cols-3 gap-2">
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">Unit</div>
                            <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Unit Barang " aria-describedby="input-group-3">
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col mt-5">
                    <label for="">Keterangan Produk</label>
                    <textarea class="mt-3" name="ket_produk" id="" cols="10" rows="6">{{ isset($data) ? ($data->ket_produk) : old('ket_produk') }}</textarea>
                </div>
                <div class="flex flex-col mt-5">
                    <label for="">Keterangan Kondisi Produk</label>
                    <textarea class="mt-3" name="ket_kondisi" id="" cols="10" rows="6">{{ isset($data) ? ($data->ket_kondisi) : old('ket_kondisi') }}</textarea>
                </div>
                <div class="text-right mt-5">
                    <a href="">
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    </a>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </form>
        </div>
    </div>


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
                                console.log(response.datas)
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
