<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = ['nama_produk','kode_barang','produk_id','nama_barang','satuan','harga_jual','stok','ditarik'];
}
