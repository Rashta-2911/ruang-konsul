<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    // Nama tabel sesuai database
    protected $table = 'detailPemesanan';

    // Primary key
    protected $primaryKey = 'detailPemesananId';

    // Primary key bukan auto increment
    public $incrementing = false;

    // Tipe primary key
    protected $keyType = 'string';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'detailPemesananId',
        'pemesananId',
        'produkId',
        'hargaSatuan',
        'qty'
    ];

    // Nonaktifkan timestamp jika tabel tidak punya created_at & updated_at
    public $timestamps = false;

    /**
     * Relasi ke model Pemesanan
     */
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesananId', 'pemesananId');
    }

    /**
     * Relasi ke model Produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produkId', 'produkId');
    }
}
