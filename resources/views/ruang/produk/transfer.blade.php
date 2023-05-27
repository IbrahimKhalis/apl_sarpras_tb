<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('ruang/updateLokasiBarang', $barang->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <h1>Ruang Lama</h1>
        <h2>{{ $ruang->name }}</h2>
        <select name="ruang_baru" id="">
            @foreach($ruangs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>