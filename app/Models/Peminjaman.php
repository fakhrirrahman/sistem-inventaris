<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'customer_id',
        'barang_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'alasan_peminjaman',
        'jumlah_peminjaman',
    ];
}
