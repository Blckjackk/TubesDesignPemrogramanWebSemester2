<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $table = 'rekap';
    // cara membuat defauld status
    protected $fillable = ['id_user', 'id_product'];
}
