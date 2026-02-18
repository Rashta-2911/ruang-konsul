<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Nama tabel sesuai database
    protected $table = 'pembayaran';

    // Primary key
    protected $primaryKey = 'pembayaranId';

    // Primary key bukan auto increment
    public $incrementing = false;

    // Tipe primary key
    protected $keyType = 'string';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'pembayaranId',
        'customerId',
        'pemesananId',
        'chatDokterId',
        'amount',
        'metodePembayaran',
        'date',
        'status'
    ];

    // Nonaktifkan timestamp jika tabel tidak punya created_at & updated_at
    public $timestamps = false;

    /**
     * Relasi ke model Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId', 'customerId');
    }

    /**
     * Relasi ke model Pemesanan
     */
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesananId', 'pemesananId');
    }

    /**
     * Relasi ke model ChatDokter
     */
    public function chatDokter()
    {
        return $this->belongsTo(ChatDokter::class, 'chatDokterId', 'chatDokterId');
    }
}
