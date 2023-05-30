<script>
let count_produk = null;
let data_produk = {{ isset($produks) ? json_encode($produks) : json_encode([]) }};
function cek (){syncProduk();compare()}
function syncKategori(kategori_id = null){
    $('.div-jml-peminjaman, .div-subkategori, .div-ruang').remove();

    if ($('#jenis').val() == 'sarana') {
    $('.form-peminjaman .container-parent').append($('#template-sub').html());
    $('#template-ruang').hide();
} else {
    $('.form-peminjaman .container-parent').append($('#template-ruang').html());
    $('#template-sub').remove();
}

    return $.ajax({
            type: "POST",
            url: "{{ route('peminjaman.get.kategori') }}",
            data: {
                jenis: $('#jenis').val(),
                identifier: identifier
            },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {
                $('.form-peminjaman #kategori').empty();
                $('.form-peminjaman #subkategori').empty();
                $('.form-peminjaman #subkategori').append('<option value="">Pilih Sub Kategori</option>');
                $('.form-peminjaman #kategori').append('<option value="">Pilih Kategori</option>');
                $.each(response.datas, function(i,e){
                    $('.form-peminjaman #kategori').append(`<option value="${e.id}">${e.nama}</option>`);
                })
                if (kategori_id) {
                    $('.form-peminjaman #kategori').val(kategori_id)
                }
            },
            error: function (errors) {
                showAlert('Terjadi kesalahan', 'error')
                console.log(errors)
            },
        });
}

function syncSub(sub_kategori_id = null, ruang_id = null){
    let jenis = $('#jenis').val()
    if ($('#kategori').val()) {
        return $.ajax({
                type: "POST",
                url: "{{ route('peminjaman.get.subcategori') }}",
                data: {
                    kategori_id: $('#kategori').val(),
                    identifier: identifier,
                    jenis: jenis
                },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (response) {
                    $('.form-peminjaman ' + (jenis == 'sarana' ? '#subkategori' : '#ruang')).empty();
                    $('.form-peminjaman ' + (jenis == 'sarana' ? '#subkategori' : '#ruang')).append(`<option value="">Pilih ${jenis == 'sarana' ? 'Sub Kategori' : 'Ruang'}</option>`);
                    $.each(response.datas, function(i,e){
                        $('.form-peminjaman ' + (jenis == 'sarana' ? '#subkategori' : '#ruang')).append(`<option value="${e.id}">${(jenis == 'sarana' ? e.nama : e.name)}</option>`);
                    })

                    if (jenis == 'sarana') {
                        $('.form-peminjaman #subkategori').val(sub_kategori_id);
                        if (!sub_kategori_id) {
                            $('.form-peminjaman #subkategori').attr('disabled', 'disabled')
                        }
                    }else{
                        $('.form-peminjaman #ruang').val(ruang_id)
                        if (!ruang_id) {
                            $('.form-peminjaman #ruang').removeAttr('disabled');
                        }
                    }
                },
                error: function (errors) {
                    console.log(errors)
                },
            });
    }
}

function syncProduk(value = null){
    if ($('#subkategori').val()) {
        return $.ajax({
                type: "POST",
                url: "{{ route('peminjaman.get.produk') }}",
                data: {
                    id: $('#subkategori').val(),
                    page: '{{ isset($page) ? $page : "public" }}',
                    peminjaman_id: '{{ isset($data) ? $data["id"] : "" }}'
                },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (response) {
                    @if ($page == 'public')
                    $('.div-subkategori .jml-produk') ? $('.div-subkategori .jml-produk').remove() : ''
                    $('.div-subkategori').append(`<span class="jml-produk ${response.datas < 1 ? 'text-red-500' : ''}">Jumlah Produk pada kategori: ${response.datas}</span>`)
                    if (response.datas > 0) {
                        $('.form-peminjaman .submit-btn').removeAttr('disabled')
                    }else{
                        $('.form-peminjaman .submit-btn').attr('disabled', 'disabled')
                    }
                    count_produk = response.datas;
                    compare();
                    @else
                    $('#produk').empty();
                    $('#produk').append(`<option value="">Pilih Produk</option>`)
                    $.each(response.datas, function(i,e){
                        $('#produk').append(`<option value="${e.id}">${e.nama}</option>`)
                    })
                    $('#produk').val(data_produk)
                    @endif
                },
                error: function (errors) {
                    console.log(errors)
                },
            });
    }else{
        $('.div-subkategori .jml-produk') ? $('.div-subkategori .jml-produk').remove() : ''
        $('.form-peminjaman .submit-btn').attr('disabled', 'disabled')
    }
}

function compare(){
    if ($('input#jml_peminjaman').val() > 0 && count_produk == null) {
        $('#subkategori').removeAttr('disabled')
    }else if($('input#jml_peminjaman').val() > 0 && count_produk != null){
        $('.div-jml-peminjaman .result-compare').remove()
        if ($('input#jml_peminjaman').val() > count_produk) {
            $('.div-jml-peminjaman').append(`<span class="result-compare text-red-500">Jumlah produk yang tersedia tidak mencukupi jumlah permintaan</span>`)
            $('.form-peminjaman .submit-btn').attr('disabled', 'disabled')
        }else{
            $('.form-peminjaman .submit-btn').removeAttr('disabled')
        }
    }else{
        $('.form-peminjaman .submit-btn').attr('disabled', 'disabled')
    }
}

function syncRuang(){
    if ($('.form-peminjaman #ruang').val()) {
        $('.form-peminjaman .submit-btn').removeAttr('disabled')
    }else{
        $('.form-peminjaman .submit-btn').attr('disabled', 'disabled')
    }
}
</script>
@if (isset($data))
<script>
    syncKategori({{ $data['kategori_id'] }}).then(() => {
        @if ($data['jenis'] == 'sarana')
        syncSub({{ $data['sub_kategori_id'] }}).then(() => {
            syncProduk()
        })
        @else    
        syncSub(null, {{ $data['ruang_id'] }})
        @endif
    })
</script>
@endif