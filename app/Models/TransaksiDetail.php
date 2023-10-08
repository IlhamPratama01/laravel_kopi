<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'detail_transaksi';
   // Daftar atribut yang dapat diisi (fillable)
    protected $fillable = [
    'id',
    'id_produk',
    'nama_produk',
    'harga',
    'jumlah'

];


}
