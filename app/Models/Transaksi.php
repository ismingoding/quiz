<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';

    protected $fillable = [
        'no_transaksi',
        'tgl_transaksi',
        'namapelanggan',
        'id_barang',
        'id_jenis',
        'kuantitas',
        'total_bayar',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
