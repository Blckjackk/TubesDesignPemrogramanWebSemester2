<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=, initial-scale=1.0">
   <title>Edit Booking</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f4f4f4;
           margin: 0;
           padding: 0;
       }

       .container {
           max-width: 600px;
           margin: 50px auto;
           background-color: #fff;
           padding: 30px;
           border-radius: 5px;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
       }

       h1 {
           text-align: center;
           margin-bottom: 30px;
           color: #333;
       }

       .form-group {
           margin-bottom: 20px;
       }

       label {
           font-weight: bold;
           display: block;
           margin-bottom: 5px;
           color: #555;
       }

       input[type="text"],
       select {
           width: 100%;
           padding: 10px;
           border: 1px solid #ccc;
           border-radius: 4px;
           box-sizing: border-box;
           font-size: 14px;
       }

       input[type="text"]:focus,
       select:focus {
           outline: none;
           border-color: #4CAF50;
           box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
       }

       .btn {
           background-color: #4CAF50;
           color: #fff;
           border: none;
           padding: 10px 20px;
           font-size: 16px;
           cursor: pointer;
           border-radius: 4px;
       }

       .btn:hover {
           background-color: #45a049;
       }
   </style>
</head>
<body>
   <div class="container">
       <h1>Edit Booking</h1>
       <form action="{{ route('update.booking', $booking->id) }}" method="POST">
           @csrf
           @method('PUT')

           <div class="form-group">
               <label for="customer">Nama Pelanggan</label>
               <input type="text" id="customer" name="customer" value="{{ $booking->customer_name }}" readonly>
           </div>

           <div class="form-group">
               <label for="product">Nama Product</label>
               <input type="text" id="product" name="product" value="{{ $booking->product_name }}" readonly>
           </div>

           <div class="form-group">
               <label for="payment_method">Metode Pembayaran:</label>
               <select id="payment_method" name="payment_method" class="form-control">
                   <option value="credit_card" >Kartu Kredit</option>
                   <option value="debit_card" >Kartu Debit</option>
                   <option value="bank_transfer" >Transfer Bank</option>
                   <option value="cash" >Tunai</option>
               </select>
           </div>

           <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control">
                   <option value="Di Booking" {{ $booking->status == 'Di Booking' ? 'selected' : '' }}>Di Booking</option>
                   <option value="Lunasss" {{ $booking->status == 'Lunasss' ? 'selected' : '' }}>Lunasss</option>
               </select>
           </div>

           <button type="submit" class="btn">Bayar Booking</button>
       </form>
   </div>
</body>
</html>
