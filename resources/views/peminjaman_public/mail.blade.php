
<a href="{{ route('peminjaman.show', $kode) }}">Klik disini untuk melihat peminjamanan anda</a>
@if ($status == 'diterima')
    <p>Diterima gaes</p>
@elseif($status == 'ditolak')
    <p>{{ $ket }}</p>
@endif