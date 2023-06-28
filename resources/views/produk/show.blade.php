@extends('mylayouts.main')

@section('content')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail {{ $data->nama }}
    </h2>
</div>
@include('produk.detail')
@endsection