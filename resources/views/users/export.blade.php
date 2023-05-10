<table>
    <thead>
        <tr>
            <th align="center">NO</th>
            <th align="center">Email</th>
            <th align="center">NIP</th>
            <th align="center">Nama Lengkap</th>
            <th align="center">Jenis Kelamin</th>
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
        </tr>
        @endforeach
    </tbody>
</table>