@extends('mylayouts.main')

@section('content')
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">
            Import Data Petugas
        </h2>
    </div>
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
        <div id="vertical-form" class="p-5">
            <div class="preview">
                <div>
                    <label for="vertical-form-1" class="form-label">Pilih File</label>
                    {{-- <input class="form-control" type="file" id="formFile" name="file" required> --}}
                    <input class="form-control" type="file" id="vertical-form-1" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                <a href="{{ route('users.index', [$role]) }}" class="btn px-5 ml-3">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection