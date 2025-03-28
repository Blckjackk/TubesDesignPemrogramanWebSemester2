<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding-top: 50px;
        }
        h1 {
            color: #333;
        }
        form {
            display: inline-block;
            margin-top: 20px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Konfirmasi Hapus Produk</h1>
    <p>Apakah Anda yakin ingin menghapus produk "{{ $product->name }}"?</p>

    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Ya, Hapus</button>
    </form>

    <a href="{{ route('product.store') }}">Batal</a>
</body>
</html>