<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mengarah ke product.update, dan passing id, menggunakan $product.id --}}
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>
        <div>
            <label for="desc">Description:</label>
            <textarea id="desc" name="desc" required>{{ old('desc', $product->desc) }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required>
        </div>
        <div>
            <label for="stok">Stock:</label>
            <input type="number" id="stok" name="stok" value="{{ old('stok', $product->stok) }}" required>
        </div>
        <div>
            <label>Jenis:</label>
            <input type="radio" id="sepatu" name="jenis" value="Sepatu" {{ old('jenis', $product->jenis) == 'Sepatu' ? 'checked' : '' }} required>
            <label for="sepatu">Sepatu</label>
            <input type="radio" id="tas" name="jenis" value="Tas" {{ old('jenis', $product->jenis) == 'Tas' ? 'checked' : '' }} required>
            <label for="tas">Tas</label>
        </div>

        <div>
            <label for="id_merek">Merek:</label>
            <select id="id_merek" name="id_merek" required>
                <option value="">Pilih Merek</option>
                @foreach($mereks as $merek)
                    <option value="{{ $merek->id }}" {{ old('id_merek', $product->id_merek) == $merek->id ? 'selected' : '' }}>{{ $merek->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
