<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    use HasFactory;

    protected $table = 'sepatu';
    protected $fillable = ['nama_sepatu', 'harga_sepatu', 'deskripsi_sepatu', 'id_merek', 'foto_sepatu'];
}
