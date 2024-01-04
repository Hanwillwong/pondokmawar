<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatHarga extends Model
{
    use HasFactory;

    protected $table = 'riwayatharga';
    protected $PrimaryKey = 'id';
    protected $fillable = ['barang_id','harga_beli','harga_jual'];

    // Jika Anda tidak ingin menggunakan timestamps di tabel ini, Anda bisa menonaktifkannya:
    public $timestamps = true;

    // Relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'barang_id','id');
    }
}