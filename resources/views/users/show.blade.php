@extends('mylayouts.main')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4><strong>Detail {{ $role }}</strong></h4>
    <form action="{{ route('users.index', [$role]) }}" method="get">
        @include('mypartials.tahunajaran')
        <button class="btn btn-danger" type="submit">Kembali</button>
    </form>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="table  table-borderless table-hover">
                    <table class="table align-middle">
                        <tr class="row">
                            <td class="col-3" style="font-weight: 600;">Nama</td>
                            <td class="col-1">:</td>
                            <td class="col-8">{{ $user->name }}</td>
                        </tr>
                        <tr class="row">
                            <td class="col-3" style="font-weight: 600;">Email</td>
                            <td class="col-1">:</td>
                            <td class="col-8">{{ $user->email }}</td>
                        </tr>
                        <tr class="row">
                            <td class="col-3" style="font-weight: 600;">NIP</td>
                            <td class="col-1">:</td>
                            <td class="col-8">{{ $user->nip }}</td>
                        </tr>
                        <tr class="row">
                            <td class="col-3" style="font-weight: 600;">Jenis Kelamin</td>
                            <td class="col-1">:</td>
                            <td class="col-8">{{ $user->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <img class=""
                    src="{{ $user->profil == '/img/profil.png' ? asset($user->profil) : asset('storage/' . $user->profil) }}"
                    alt="profil" style="max-height: 15rem;width: 100%;object-fit: contain">
            </div>
        </div>
    </div>
</div>
@endsection