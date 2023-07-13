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
    'tanggal',
    'waktu',
    'status',
    'nama_produk',
    'jumlah',
    'grandtotal'
];

public function user()
{
    return $this->belongsTo(User::class);
}

}
