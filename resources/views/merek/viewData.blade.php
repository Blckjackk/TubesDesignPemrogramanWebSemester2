<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name Merek</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($merek as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td><a href="">Edit Coy</a></td>
                    <td><a href="">Delete Bang</a></td>
                </tr>
            @endforeach
        </tbody>



    </table>
    <div>
        <a href="{{ route('products.create') }}">Tambah Data bang</a>
    </div>

    
</body>
</html>