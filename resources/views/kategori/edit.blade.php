<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
</head>
<body>
    
    <form action="{{ route('sementara.kategori.update', $kategori->id) }}" method="post">
        @csrf
        <select name="sekolah_id">
            @foreach($sekolah as $item)
                <option value="{{ $item->id }}" {{ $item->id == $kategori->sekolah_id ? 'selected' : ''}}>{{ $item->nama }}</option>
            @endforeach
        </select>
        <input type="text" name="nama" value="{{ $kategori->nama }}">
        <input type="text" name="kode" value="{{ $kategori->kode }}">
        <textarea name="subCategory" id="" cols="30" rows="10" disabled>
            @foreach($subCategory as $item)
            {{ $item->nama }}
            @endforeach
        </textarea>
        <button type="submit">Submit</button>
    </form>

</body>
</html>