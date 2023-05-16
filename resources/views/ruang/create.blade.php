<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/ruang') }}" method="post">
        @csrf
        <label for="">nama</label>
        <input type="text" name="name">
        <label for="">jurusan</label>
        <select name="jurusan_id" id="">
            @foreach($datas as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
            @endforeach
        </select>
        <label for="">status</label>
        <input type="checkbox" name="bisa_dipinjam">
    
        <button type="submit">Submit</button>
    </form>
</body>
</html>