<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoriALKES';
    protected $primaryKey = 'kategoriId';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'kategoriId',
        'kategoriName'
    ];

    /**
     * Relasi ke model Produk
     * Satu kategori memiliki banyak produk
     */
    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategoriId', 'kategoriId');
    }
}