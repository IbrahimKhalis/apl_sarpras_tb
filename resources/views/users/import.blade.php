@extends('mylayouts.main')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4><strong>Import</strong></h4>
    <x-ButtonCustom class="btn btn-danger rounded" route="{{ route('users.index', [$role]) }}">
        Kembali
    </x-ButtonCustom>
</div>
<div class="card">
    <div class="card-body">
        <form action="/import/users/{{ $role }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('mypartials.tahunajaran')

            @if (count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
            @endif
            <div class="mb-3">
                <label for="formFile" class="form-label">Pilih File</label>
                <input class="form-control" type="file" id="formFile" name="file" required>
            </div>
            <button class="btn btn-primary" type="submit">Import</button>
        </form>
    </div>
</div>
@endsection