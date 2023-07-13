<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // use HasFactory;
    protected $table = 'produk';

    // Daftar atribut yang dapat diisi (fillable)
    protected $fillable = [
        'id',
        'nama_produk',
        'harga',
        'stok',
        'gambar',
        'deskripsi',
        'status'
    ];

    protected $primaryKey = 'id';

    
}
