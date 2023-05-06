<table>
    <thead>
        <tr>
            <th align="center">NO</th>
            <th align="center">Email</th>
            <th align="center">NIP</th>
            <th align="center">Nama Lengkap</th>
            <th align="center">Jenis Kelamin</th>
            <th align="center">Tempat Lahir</th>
            <th align="center">Tanggal Lahir</th>
            <th align="center">Agama</th>
            <th align="center">Provinsi</th>
            <th align="center">Kota/Kabupaten</th>
            <th align="center">Kecamatan</th>
            <th align="center">Kelurahan</th>
            <th align="center">Jalan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $user->email }}</td>
            <th align="center">{{ $user->nip }}</th>
            <td align="center">{{ $user->name }}</td>
            <td align="center">{{ $user->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
            <td align="center">{{ $user->tempat_lahir }}</td>
            <td align="center">{{ $user->tanggal_lahir }}</td>
            <td align="center">{{ $user->agama }}</td>
            <td align="center">{{ $user->provinsi }}</td>
            <td align="center">{{ $user->kabupaten }}</td>
            <td align="center">{{ $user->kecamatan }}</td>
            <td align="center">{{ $user->kelurahan }}</td>
            <td align="center">{{ $user->jalan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>