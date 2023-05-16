<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/ruang', $ruang->id) }}" method="post">
        @method('PUT')
        @csrf
        <label for="">nama</label>
        <input type="text" name="name" value="{{ $ruang->name }}">
        <label for="">kategori</label>
        <select name="kategori_id" id="">
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->id == $ruang->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
            @endforeach
        </select>
        <label for="">jurusan</label>
        <select name="jurusan_id" id="">
            @foreach($datas as $jurusan)
                <option value="{{ $jurusan->id }}" {{ $jurusan->id == $ruang->jurusan_id ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
            @endforeach
        </select>
        <label for="">status</label>
        <input type="checkbox" name="bisa_dipinjam"  {{ $ruang->bisa_dipinjam == true ? 'checked' : '' }}>
    
        <button type="submit">Submit</button>
    </form>
</body>
</html>