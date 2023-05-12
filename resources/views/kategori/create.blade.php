<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
</head>
<body>
    
    <form action="{{ route('sementara.kategori.create') }}" method="post">
        @csrf
        <select name="sekolah_id">
            @foreach($sekolah as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        <input type="text" name="nama">
        <input type="text" name="kode">
        <textarea name="subCategory" id="" cols="30" rows="10">
            
        </textarea>
        <button type="submit">Submit</button>
    </form>

</body>
</html>