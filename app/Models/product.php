<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Events\HargaProdukUpdated;
use Laravel\Sanctum\HasApiTokens;

class product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $PrimaryKey = 'id';
    protected $table = 'product';
    protected $fillable = ['id','nama_barang','merk','supplier','satuanid','harga_beli','harga_jual'];

    public function riwayatharga()
    {
        return $this->hasMany(riwayatharga::class, 'barang_id', 'id');
    }

    public function updateHarga($newHargaBeli, $newHargaJual)
    {
        $this->harga_beli = $newHargaBeli;
        $this->harga_jual = $newHargaJual;
        $this->save();

        event(new HargaProdukUpdated($this));
    }

    public function satuan()
    {
        return $this->belongsTo(satuan::class, 'satuanid','id');
    }

    public function scopeFilter($query)
    {
        return $query->where('nama_barang','like','%' . request('search') . '%');
            //    ->orwhere('merk','like','%' . request('search') . '%')
            //    ->orwhere('supplier','like','%' . request('search') . '%');
    }
}
