@extends('layouts.master')

@section('css')
<style>
    h1 {
        text-align: center;
    }
    .subTitle{
        font-family: 'lato';
        font-size: 48px;
        color: var(--blue);
        margin-bottom: 40px;
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
        padding: 3rem 2rem;
        width: 90%;
        align-items: center;
        margin: auto
    }
    .form-step2 {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        padding: 3rem 2rem;
        width: 80%;
        align-items: center;
        margin: auto
    }
    .cards{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        gap: 50px;
    }
    .card-schools{
        width: 250px;
        background-color: transparent;
        border: 1px solid #dadada;
        border-top-left-radius:10px;
        border-top-right-radius: 10px;
    }
    .card-schools .img-school img{
        width: 70%;
        margin: auto;
        transition: 0.4s
    }
    .card-schools:hover .img-school img{
        scale: 110%;
    }
    .desc-school{
        background-color: #1C438C;
        border-top-left-radius:10px;
        border-top-right-radius: 10px;
        padding: 8px 0px;
    }
    .desc-school h1{
        font-size: 20px;
        font-family: 'lato';
        color: white;
        margin-bottom: 4px;
    }
    .desc-school p{
        color: #dadada;
        text-align: center;
        font-family: 'lato';
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
    <h1 class="subTitle pt-16">Peminjaman</h1>
    <ul class="form-stepper form-stepper-horizontal" style="width: 60%;margin:0 auto">
        <li class="form-stepper-active text-center form-stepper-list" step="1">
            <a class="">
                <span class="form-stepper-circle">
                    <span>1</span>
                </span>
                <div class="label">Pilih Sekolah</div>
            </a>
        </li>
        <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
            <a class="">
                <span class="form-stepper-circle text-muted">
                    <span>2</span>
                </span>
                <div class="label text-muted">Peminjaman</div>
            </a>
        </li>
    </ul>
    <section id="step-1" class="form-step" style="margin-top: 1rem;">
        <div class="cards">
            @foreach ($sekolahs as $sekolah)
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modalSekolah"
            onclick="set_identifier({{ $sekolah->id }})">
                <div class="card-schools">
                    <div class="img-school">
                        @if ($sekolah->logo != '/img/tutwuri.png')
                        <img src="{{ asset('storage/' . $sekolah->logo) }}" alt="">
                        @else
                        <img src="{{ $sekolah->logo }}" alt="">
                        @endif
                    </div>
                    <div class="desc-school">
                        <h1>{{ $sekolah->nama }}</h1>
                        <p>{{ $sekolah->npsn }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
            
        {{-- @foreach ($sekolahs as $sekolah)
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modalSekolah" class="btn btn-primary"
            onclick="set_identifier({{ $sekolah->id }})">{{ $sekolah->nama }}</a>
        @endforeach --}}
    </section>
    <section id="step-2" class="form-step2 d-none place-items-center form-stepper-active" style="margin-top: 1rem;">
        <form action="{{ route('peminjaman.store') }}" class="form-peminjaman" method="POST">
            <x-FormPeminjaman />
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
                    console.log(response)
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
@include('peminjaman.js')
<script>
    $('.form-peminjaman').on('submit', function(e){
    e.preventDefault()
    start_loading()
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
                count_produk = null;
                stop_loading()
                Swal.fire({
                    title: 'Berhasil dikirim',
                    text: "Silahkan cek email anda untuk data pengajuan anda",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Kembali'
                    }).then((result) => {
                        window.location.href = '{{ route('index') }}'
                })
            },
            error: function (errors) {
                count_produk = null;
                stop_loading();
                Swal.fire({
                    title: 'Failed',
                    text: "Mohon maaf telah terjadi kesalahan, segera hubungi petugas sarpras",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Kembali'
                    }).then((result) => {
                        window.location.href = '{{ route('index') }}'
                })
            },
        });
})
</script>
@endsection