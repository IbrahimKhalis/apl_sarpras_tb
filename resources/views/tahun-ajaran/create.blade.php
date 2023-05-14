@extends('mylayouts.main')

@section('content')
<div class="d-flex justify-content-between mb-3 align-items-center">
    <h4><strong>Tambah Tahun Ajaran</strong></h4>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('tahun-ajaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tahun_awal" class="form-label">Tahun Awal</label>
                <input type="number" min="1900" max="2099" step="1" value="{{ date('Y', strtotime(now())) }}" class="form-control @error('tahun_awal') is-invalid @enderror" id="tahun_awal"
                    name="tahun_awal">
                @error('tahun_awal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tahun_akhir" class="form-label">Tahun Akhir</label>
                <input type="number" min="1900" max="2099" step="1" value="{{ date('Y', strtotime(now())) + 1}}" class="form-control @error('tahun_akhir') is-invalid @enderror" id="tahun_akhir"
                    name="tahun_akhir">
                @error('tahun_akhir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 ml-4">
                <input class="form-check-input" type="checkbox" name="status" onclick="isChecked()">
                <label class="form-label message">Tidak Aktif</label>
            </div>
            <div class="col-span-12 xl:col-span-6 mt-5 flex">
                <div class="mt-3 xl:mt-0">
                    <button type="submit" class="btn btn-primary px-5 mr-5">Submit</button>
                </div>
                <a href="{{ route('tahun-ajaran.index') }}" class="btn px-5">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
    <script>
        function isChecked(){
            if($(".form-check-input").is(":checked")){
                $('.message').html('Aktif');
            }else{
                $('.message').html('Tidak Aktif');
            }
        }
    </script>
@endpush