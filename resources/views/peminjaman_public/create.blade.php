@extends('layouts.master')

@section('css')
<style>
    h1 {
        text-align: center;
    }

    h2 {
        margin: 0;
    }

    #multi-step-form-container {
        margin-top: 5rem;
    }

    .text-center {
        text-align: center;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .pl-0 {
        padding-left: 0;
    }

    .button {
        padding: 0.7rem 1.5rem;
        border: 1px solid #4361ee;
        background-color: #4361ee;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-btn {
        border: 1px solid #0e9594;
        background-color: #0e9594;
    }

    .mt-3 {
        margin-top: 2rem;
    }

    .d-none {
        display: none;
    }

    .form-step {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        padding: 3rem;
    }

    .font-normal {
        font-weight: normal;
    }

    ul.form-stepper {
        counter-reset: section;
        margin-bottom: 3rem;
    }

    ul.form-stepper .form-stepper-circle {
        position: relative;
    }

    ul.form-stepper .form-stepper-circle span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateY(-50%) translateX(-50%);
    }

    .form-stepper-horizontal {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    ul.form-stepper>li:not(:last-of-type) {
        margin-bottom: 0.625rem;
        -webkit-transition: margin-bottom 0.4s;
        -o-transition: margin-bottom 0.4s;
        transition: margin-bottom 0.4s;
    }

    .form-stepper-horizontal>li:not(:last-of-type) {
        margin-bottom: 0 !important;
    }

    .form-stepper-horizontal li {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: start;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .form-stepper-horizontal li:not(:last-child):after {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        height: 1px;
        content: "";
        top: 32%;
    }

    .form-stepper-horizontal li:after {
        background-color: #dee2e6;
    }

    .form-stepper-horizontal li.form-stepper-completed:after {
        background-color: #4da3ff;
    }

    .form-stepper-horizontal li:last-child {
        flex: unset;
    }

    ul.form-stepper li a .form-stepper-circle {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin-right: 0;
        line-height: 1.7rem;
        text-align: center;
        background: rgba(0, 0, 0, 0.38);
        border-radius: 50%;
    }

    .form-stepper .form-stepper-active .form-stepper-circle {
        background-color: #4361ee !important;
        color: #fff;
    }

    .form-stepper .form-stepper-active .label {
        color: #4361ee !important;
    }

    .form-stepper .form-stepper-active .form-stepper-circle:hover {
        background-color: #4361ee !important;
        color: #fff !important;
    }

    .form-stepper .form-stepper-unfinished .form-stepper-circle {
        background-color: #f8f7ff;
    }

    .form-stepper .form-stepper-completed .form-stepper-circle {
        background-color: #0e9594 !important;
        color: #fff;
    }

    .form-stepper .form-stepper-completed .label {
        color: #0e9594 !important;
    }

    .form-stepper .form-stepper-completed .form-stepper-circle:hover {
        background-color: #0e9594 !important;
        color: #fff !important;
    }

    .form-stepper .form-stepper-active span.text-muted {
        color: #fff !important;
    }

    .form-stepper .form-stepper-completed span.text-muted {
        color: #fff !important;
    }

    .form-stepper .label {
        font-size: 1rem;
        margin-top: 0.5rem;
    }

    .form-stepper a {
        cursor: default;
    }
</style>
@endsection

@section('content')
<div id="multi-step-form-container">
    <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
        <li class="form-stepper-active text-center form-stepper-list" step="1">
            <a class="mx-2">
                <span class="form-stepper-circle">
                    <span>1</span>
                </span>
                <div class="label">Pilih Sekolah</div>
            </a>
        </li>
        <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
            <a class="mx-2">
                <span class="form-stepper-circle text-muted">
                    <span>2</span>
                </span>
                <div class="label text-muted">Peminjaman</div>
            </a>
        </li>
    </ul>
    <section id="step-1" class="form-step">
        @foreach ($sekolahs as $sekolah)
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modalSekolah" class="btn btn-primary"
            onclick="set_identifier({{ $sekolah->id }})">{{ $sekolah->nama }}</a>
        @endforeach
    </section>
    <section id="step-2" class="form-step d-none place-items-center form-stepper-active">
        <form action="{{ route('peminjaman.store') }}" class="form-peminjaman" method="POST">
            <div class="mt-3">
                <div class="col-md-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama">
                </div>
            </div>
            <div class="mt-3">
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email">
                </div>
            </div>
            <div class="mt-3">
                <div class="col-md-12">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select name="kelas" class="w-full" id="kelas">
                        <option value="">Pilih Kelas</option>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <div class="col-md-12">
                    <label for="jenis" class="form-label">Kategori Peminjaman</label>
                    <select name="jenis" class="w-full" id="jenis">
                        <option value="">Pilih Kategori</option>
                        <option value="sarana">Sarana</option>
                        <option value="prasaran">Prasarana</option>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <div class="col-md-12">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori_id" class="w-full" id="kategori">
                        <option value="">Pilih Kategori</option>
                    </select>
                </div>
            </div>
            <div class="mt-3 div-jml-peminjaman">

            </div>
            <div class="mt-3 div-subkategori">
                <div class="col-md-12">
                    <label for="subkategori" class="form-label">Sub Kategori</label>
                    <select name="sub_kategori_id" class="w-full" id="subkategori">
                        <option value="">Pilih Sub Kategori</option>
                    </select>
                </div>
            </div>
            <div class="mt-5 flex gap-3">
                <button class="button submit-btn" type="submit" disabled>Kirim</button>
            </div>
        </form>
    </section>
</div>

<div class="modalkey modal fade" id="modalSekolah" tabindex="-1" aria-labelledby="role" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('roles.store') }}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="role">Kode Sekolah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="sekolah_id">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="kode" class="form-label">Kode</label>
                            <input class="form-control" type="text" id="kode" placeholder="Masukan Kode Sekolah"
                                name="kode" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const navigateToFormStep = (stepNumber) => {
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });

    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
        formStepHeader.classList.add("form-stepper-unfinished");
        formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });

    document.querySelector("#step-" + stepNumber).classList.remove("d-none");

    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');

    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");

    for (let index = 0; index < stepNumber; index++) {
        const formStepCircle = document.querySelector('li[step="' + index + '"]');
        if (formStepCircle) {
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
            formStepCircle.classList.add("form-stepper-completed");
        }
    }
};
</script>

<script>
    let identifier;
    function set_identifier(identifier) {
        $('input[name="sekolah_id"]').val(identifier)
    }

    $('#modalSekolah form').on('submit', function(e){
        e.preventDefault();
        if (!identifier) {
            let form = new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('peminjaman.cek_kode') }}",
                data: form,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (response) {
                    identifier = response.identifier;
                    $('#modalSekolah').slideUp(300)
                    showAlert(response.message, 'success');
                    $('.form-peminjaman #kelas').empty()
                    $('.form-peminjaman #kelas').append('<option value="">Pilih Kelas</option>')
                    $.each(response.kelas, function(i,e){
                        $('.form-peminjaman #kelas').append(`<option value="${e.id}">${e.nama}</option>`);
                    })
                    navigateToFormStep(2)
                },
                error: function (errors) {
                    showAlert(errors.responseJSON.message, 'error')
                },
            });
        }else{
            showAlert('Anda sudah memilih sekolah', 'error')
        }
    })
</script>

<script>
    let count_produk = null;
    $('#jenis').on('change', function(){
    $.ajax({
            type: "POST",
            url: "{{ route('peminjaman.get.kategori') }}",
            data: {
                jenis: $(this).val(),
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
            },
            error: function (errors) {
                console.log(errors)
            },
        });
    
        if ($(this).val() == 'sarana') {
            $('.div-jml-peminjaman').append(`
                <div class="col-md-12">
                    <label for="jml_peminjaman" class="form-label">Jumlah Peminjaman</label>
                    <input type="number" name="jml_peminjaman" id="jml_peminjaman" min="1" onkeyup="compare()">
                </div>
            `)
        }else{
            $('.div-jml-peminjaman').empty();
        }
})

$('#kategori').on('change', function(){
    $.ajax({
            type: "POST",
            url: "{{ route('peminjaman.get.subcategori') }}",
            data: {
                kategori_id: $(this).val(),
                identifier: identifier
            },
            dataType: "json",
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {
                $('.form-peminjaman #subkategori').empty();
                $('.form-peminjaman #subkategori').append('<option value="">Pilih Sub Kategori</option>');
                $.each(response.datas, function(i,e){
                    $('.form-peminjaman #subkategori').append(`<option value="${e.id}">${e.nama}</option>`);
                })

                if ($('#jenis').val() == 'sarana') {
                    $('.form-peminjaman #subkategori').attr('disabled', 'disabled');
                } else {
                    $('.form-peminjaman #subkategori').removeAttr('disabled');
                }
            },
            error: function (errors) {
                console.log(errors)
            },
        });
})

$('#subkategori').on('change', function(){
    if ($(this).val()) {
        $.ajax({
                type: "POST",
                url: "{{ route('peminjaman.cek_produk') }}",
                data: {
                    id: $(this).val(),
                },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (response) {
                    $('.div-subkategori .jml-produk') ? $('.div-subkategori .jml-produk').remove() : ''
                    $('.div-subkategori').append(`<span class="jml-produk ${response.count < 1 ? 'text-red-500' : ''}">Jumlah Produk pada kategori: ${response.count}</span>`)
                    if (response.count > 0) {
                        $('.form-peminjaman .submit-btn').removeAttr('disabled')
                    }else{
                        $('.form-peminjaman .submit-btn').attr('disabled', 'disabled')
                    }
                    count_produk = response.count;
                    compare();
                },
                error: function (errors) {
                    console.log(errors)
                },
            });
    }else{
        $('.div-subkategori .jml-produk') ? $('.div-subkategori .jml-produk').remove() : ''
        $('.form-peminjaman .submit-btn').attr('disabled', 'disabled')
    }
})

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

$('.form-peminjaman').on('submit', function(e){
    e.preventDefault()
    let form = new FormData($(this)[0])
    form.set('identifier', identifier)
    $.ajax({
            type: "POST",
            url: "{{ route('peminjaman.store') }}",
            data: form,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function (e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function (response) {
                console.log(response)
            },
            error: function (errors) {
                console.log(errors)
            },
        });
})
</script>
@endsection