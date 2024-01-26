<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $PrimaryKey = 'id';
    protected $table = 'satuan';
    protected $fillable = ['id','nama'];

    public function product()
    {
        return $this->hasMany(product::class, 'satuanid', 'id');
    }
}
