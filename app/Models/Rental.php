<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rental';
    // cara membuat defauld status
    protected $fillable = ['id_user', 'id_product', 'quantity', 'price', 'rental_date', 'return_date', 'status'];
}
