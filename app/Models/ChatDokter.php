<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dokter;

class ChatDokter extends Model
{
    protected $table = 'chat_dokter';
    protected $primaryKey = 'chatDokterId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'chatDokterId',
        'customerId',
        'dokterId',   // ✅ benar
        'date',
        'status',
        'gambar'
    ];

    // Relasi ke dokter
    public function dokter()
    {
        return $this->belongsTo(
            Dokter::class,
            'dokterId',   // foreign key di chat_dokter
            'dokterId'    // primary key di dokter
        );
    }
}
