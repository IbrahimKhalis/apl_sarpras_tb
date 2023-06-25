@extends('layouts.master')

@section('content')
<div class="p-10 mt-20">
    @include('produk.detail')
</div>
@endsection

@section('js')
    <script>
        $('.btn-kembali').attr('href', localStorage.getItem('url') ?? '');
    </script>
@endsection