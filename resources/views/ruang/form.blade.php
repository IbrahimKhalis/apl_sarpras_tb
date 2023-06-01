@extends('myLayouts.main')

@push('css')
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
@endpush

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{ isset($data) ? 'Edit' : 'Tambah' }} Ruang
    </h2>
</div>
<div>
    <div id="multi-step-form-container">
        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
            <li class="form-stepper-active text-center form-stepper-list" step="1">
                <a class="mx-2">
                    <span class="form-stepper-circle">
                        <span>1</span>
                    </span>
                    <div class="label">Membuat Ruang</div>
                </a>
            </li>
            <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>2</span>
                    </span>
                    <div class="label text-muted">Tambah Produk</div>
                </a>
            </li>
        </ul>
        <section id="step-1" class="form-step">
            <form action="{{ isset($data) ? route('ruang.update', [$data->id]) : route('ruang.store') }}" method="POST">
                @csrf
                @if (isset($data))
                @method('patch')
                @endif
                <div class="mt-3">
                    <div>
                        <label for="crud-form-1" class="form-label">Nama Ruang</label>
                        <input id="crud-form-1" type="text" class="form-control w-full" name="name"
                            value="{{ isset($data) ? $data->name : old('nama') }}" placeholder="Nama">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Kategori</label>
                        <select name="kategori_id" id="" class="tom-select w-full">
                            @foreach($kategoris as $kategori)
                            @if ($kategori->jenis == 'prasarana')
                            <option {{ isset($data) ? ($kategori->id == $data->kategori_id ? 'selected' : '') :'' }}
                                value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Luas</label>
                        <input id="crud-form-1" type="number" class="form-control w-full" name="luas"
                            value="{{ isset($data) ? $data->luas : old('luas') }}" placeholder="Luas Tahan">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">No Registrasi</label>
                        <div class="sm:grid grid-cols-3 gap-2">
                            <div class="input-group">
                                <div id="input-group-3" class="input-group-text">No</div>
                                <input type="string" class="form-control"
                                name="no_reg"
                                value="{{ isset($data) ? $data->no_reg : old('no_reg') }}" placeholder="Masukkan Nomor Registrasi">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Ruang Bisa Dipinjam</label>
                        <input type="checkbox" name="ruang_dipinjam" class="form-check-input" {{ isset($data) ?
                            ($data->ruang_dipinjam == 1 ? 'checked' : '') : '' }}>
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-2" class="form-label">Produk Bisa Dipinjam</label>
                        <input type="checkbox" name="produk_dipinjam" class="form-check-input" {{ isset($data) ?
                            ($data->produk_dipinjam == 1 ? 'checked' : '') : '' }}>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                </div>
            </form>
        </section>
        <section id="step-2" class="form-step d-none place-items-center">
            <div class="mt-3" style="margin-left: 40%">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#modalAddProduk"
                    class="btn btn-outline-primary">Tambah Produk</a>
            </div>
            <div class="mt-5 flex gap-3">
                <button class="button btn-navigate-form-step">Prev</button>
                <button class="button submit-btn">Save</button>
            </div>
        </section>

    </div>
</div>

<div class="modalkey modal fade" id="modalAddProduk" tabindex="-1" aria-labelledby="role" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="role">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori_id" class="tom-select w-full" id="kategori">
                                <option value="">Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                @if ($kategori->jenis == 'sarana')
                                <option {{ isset($data) ? ($kategori->id == $data->kategori_id ? 'selected' : '') :'' }}
                                    value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="subkategori" class="form-label">Sub Kategori</label>
                            <select name="subkategori_id" class="w-full" id="subkategori">
                                <option value="">Pilih Sub Kategori</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="produk" class="form-label">Produk</label>
                            <select name="produk_id[]" id="produk" class="w-full" multiple>
                                <option value="">Pilih Produk</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
    let id = ''
const url_update = '{{ route("ruang.update", ":id") }}'
const url_sub = '{{ route("get.sub", ":id") }}'
const url_produk = '{{ route("produk.get", ":id") }}'
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

$('#kategori').on('change', function(){
    $.ajax({
        type: "GET",
        url: url_sub.replace(':id', $(this).val()),
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            $('#subkategori').empty().append('<option value="">Pilih Sub Kategori</option>')
            $('#produk').empty().append('<option value="">Pilih Produk</option>')
            $.each(response.datas, function (key, value) {
                $('#subkategori').append(`<option value="${value.id}">${value.nama}</option>`)
            })
        },
        error: function (response) {
            showAlert('Gagal get subcategory', 'error')
        },
    });
})

$('#subkategori').on('change', function(){
    $.ajax({
        type: "GET",
        url: url_produk.replace(':id', $(this).val()),
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            $('#produk').empty().append('<option value="">Pilih Produk</option>')
            $.each(response.datas, function (key, value) {
                $('#produk').append(`<option value="${value.id}">${value.nama}</option>`)
            })
        },
        error: function (response) {
            showAlert('Gagal get produk', 'error')
        },
    });
})

$('#modalAddProduk form').on('submit', function(e){
    e.preventDefault();
    let form = new FormData($(this)[0]);
    form.set('ruang_id', id)
    $.ajax({
        type: "POST",
        url: '{{ route("ruang.tambah_produk") }}',
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
            $('#kategori').val('');
            $('#subkategori').empty().append('<option value="">Pilih Sub Kategori</option>')
            $('#produk').empty().append('<option value="">Pilih Produk</option>')
            $('#modalAddProduk').hide();
        },
        error: function (response) {
            console.log(response)
            showAlert('Gagal simpan ruang', 'error')
        },
    })
})
</script>
@endpush