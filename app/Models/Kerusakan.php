<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    use HasFactory;
    protected $table = 'kerusakan';
    protected $fillable = ['id_rental', 'id_product', 'decs', 'cost'];
}
