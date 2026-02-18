<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Produk table does not have Laravel timestamps
    public $timestamps = false;

    protected $table = 'produkALKES';
    protected $primaryKey = 'produkId';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'produkId',
        'produkName',
        'price',
        'qty',
        'gambar',
        'kategoriId',
        'adminId'
    ];

    /**
     * Relasi ke model Kategori
     * Banyak produk milik satu kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriId', 'kategoriId');
    }
}