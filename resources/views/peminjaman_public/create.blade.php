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
            data-id="{{ $sekolah->id }}">{{ $sekolah->nama }}</a>
        @endforeach
        <div class="mt-3">
            <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
        </div>
    </section>
    <section id="step-2" class="form-step d-none place-items-center">
        <div class="mt-3" style="margin-left: 40%">
        </div>
        <div class="mt-5 flex gap-3">
            <button class="button btn-navigate-form-step">Prev</button>
            <button class="button submit-btn">Save</button>
        </div>
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

document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    formNavigationBtn.addEventListener("click", () => {
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
        if (stepNumber == 2) {
            let form = new FormData($('#step-1 form')[0]);
            $.ajax({
                type: "POST",
                url: $('#step-1 form').attr('action'),
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
                    id = response.data.id
                    $('#step-1 form').attr('action', url_update.replace(':id', id)).append('<input type="hidden" name="_method" value="patch">')
                    showAlert('Berhasil tersimpan', 'success')
                    navigateToFormStep(stepNumber);
                },
                error: function (response) {
                    console.log(response)
                    showAlert('Gagal simpan ruang', 'error')
                },
            });
        }else{
            navigateToFormStep(stepNumber);
        }
    });
});
</script>

<script>
    $('a[data-tw-target="#modalSekolah"]').on('click', function(){
        $('input[name="sekolah_id"]').val($(this).attr('data-id'))
    })

    $('#modalSekolah form').on('submit', function(e){
        e.preventDefault();
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
                $('.sub-' + id + ' input').val(response.data.nama)
                showAlert('Berhasil diubah', 'success')
            },
            error: function (response) {
                console.log(response)
            },
        });
    })
</script>
@endsection