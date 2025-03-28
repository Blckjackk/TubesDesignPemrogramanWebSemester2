<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Barang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff3cd;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
    
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 900px;
            display: flex;
            flex-direction: column;
        }
    
        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
    
        .product-details {
            margin-top: 30px;
            color: #6c757d;
            text-align: center;
        }
    
        .product-details h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #ff6f00;
        }
    
        .product-details .description {
            font-size: 18px;
            margin-bottom: 20px;
        }
    
        .product-details .price {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #ff6f00;
        }
    
        .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            margin: 0 10px;
        }
    
        .btn-primary {
            background-color: #ff6f00;
            color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
    
        .btn-primary:hover {
            background-color: #e66a00;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
        }
    
        .btn-secondary {
            background-color: rgba(255, 255, 255, 0.8);
            color: #6c757d;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
    
        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
        }
    
        .rent-form {
            margin-top: 30px;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
    
        .rent-form label {
            font-weight: 500;
            color: #6c757d;
        }
    
        .rent-form input[type="number"] {
            width: 80px;
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.8);
            color: #6c757d;
            font-size: 16px;
        }
    
        .rent-form input[type="number"]:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product-image">
            <img src="{{ asset('path/to/your/product/image.jpg') }}" alt="Produk">
        </div>
        <div class="product-details">
            <h1>{{ $product->name }}</h1>
            <p class="description">{{ $product->desc }}</p>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <button class="btn btn-primary" id="show-form-btn">Sewa</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
                    <a href="{{ route('product.delete', $product->id) }}" class="btn btn-secondary">Delete</a>
                @endif
            @endauth
            
            <div class="rent-form" id="rent-form" style="display: none;">
                <form action="{{ route('product.rental.store', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                    
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>  
                    <button type="submit" class="btn btn-primary">Konfirmasi Sewa</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('show-form-btn').addEventListener('click', function() {
            document.getElementById('rent-form').style.display = 'block';
            this.style.display = 'none';
        });
    </script>
</body>
</html>