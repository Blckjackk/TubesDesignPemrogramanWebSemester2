<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tas extends Model
{
    use HasFactory;

    // Tambahkan atribut lain yang dibutuhkan oleh model ini
    protected $table = 'tas';
    protected $fillable = ['nama_tas', 'harga_tas', 'deskripsi_tas', 'id_merek', 'foto_tas'];
}
