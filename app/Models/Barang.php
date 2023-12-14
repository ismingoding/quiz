<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';

    protected $fillable = [
        'idjenis',
        'namabarang',
        'harga',
        'stok',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
