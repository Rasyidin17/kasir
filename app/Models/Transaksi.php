<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode', 'nama', 'harga', 'total', 't_har', 't_yar', 'kembalian', 'tng_beli',
    ];
}
