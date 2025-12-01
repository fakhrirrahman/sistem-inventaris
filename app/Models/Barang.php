<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'jenis_barang',
        'merk',
        'spesifikasi',
        'tahun_pengadaan',
        'sumber_anggaran',
        'lokasi_simpan',
        'catatan',
    ];
}
