@extends('layouts.master')

@section('content')
<div class="p-10 mt-20">
    @include('peminjaman.detail')
</div>
@endsection

@section('js')
    <script>
        let url = '{{ route("peminjaman.show", request("kode")) }}';
        localStorage.setItem('url', url);
    </script>
@endsection