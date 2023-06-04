<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman</title>
</head>
<body>
    <table border='1' cellspacing='0' cellpadding='10'>
        <thead>
            <th>No</th>
            <th>Kategori</th>
            <th>Sub Kategori</th>
            <th>Sekolah</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Ruang</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Email</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Jumlah Peminjaman</th>
            <th>Foto Peminjaman</th>
            <th>Foto Pengembalian</th>
            <th>Status</th>
            <th>Status Pengembalian</th>
            <th>Keterangan</th>
            <th>Tanda Tangan</th>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->kategori->nama }}</td>
                <td>{{ $data->subcategorie->nama }}</td>
                <td>{{ $data->sekolah->nama }}</td>
                <td>{{ $data->kelas->nama }}</td>
                <td>{{ $data->tahunajaran->tahun_awal }} - {{ $data->tahunajaran->tahun_akhir }} </td>
                <td>{{ $data->ruang->name }}</td>
                <td>{{ $data->kode }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jenis }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->tgl_peminjaman }}</td>
                <td>{{ $data->tgl_pengembalian }}</td>
                <td>{{ $data->jml_peninggalan }}</td>
                <td>{{ $data->foto_peminjaman }}</td>
                <td>{{ $data->foto_pengembalian }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->status_pengembalian }}</td>
                <td>{{ $data->ket }}</td>
                <td>{{ $data->ttd }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>