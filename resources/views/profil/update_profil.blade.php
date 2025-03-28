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

    {{-- Mengarah ke product.update, dan passing id, menggunakan user.id --}}
    <form action="{{ route('update.profil', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="desc">Description:</label>
            <textarea id="desc" name="desc" required>{{ old('desc', $user->desc) }}</textarea>
        </div>
        <div>
            <label for="harapan">Harapan:</label>
            <input type="text" id="harapan" name="harapan" value="{{ old('harapan', $user->harapan) }}" required>
        </div>
        <div>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto">
        </div>
        <!-- Add other fields as needed -->
    
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
