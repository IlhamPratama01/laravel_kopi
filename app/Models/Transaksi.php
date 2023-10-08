<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
   // Daftar atribut yang dapat diisi (fillable)
    protected $fillable = [
    'id',
    'id_produk',
    'tanggal',
    'waktu',
    'status',
    'nama_produk',
    'jumlah',
    'grandtotal'
];



}
