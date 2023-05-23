<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/ruang', $data->id) }}" method="post">
        @method('PUT')
        @csrf
        <label for="">nama</label>
        <input type="text" name="name" value="{{ $data->name }}">
        <label for="">kategori</label>
        <select name="kategori_id" id="">
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->id == $data->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
            @endforeach
        </select>
        <label for="">status</label>
        <input type="checkbox" name="bisa_dipinjam"  {{ $data->bisa_dipinjam == true ? 'checked' : '' }}>
    
        <button type="submit">Submit</button>
    </form>
</body>
</html>