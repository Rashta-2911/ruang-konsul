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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($chatDokter) {
            if (empty($chatDokter->chatDokterId)) {
                $last = static::orderBy('chatDokterId', 'desc')->first();
                $nextId = $last ? 'CD' . str_pad((int)substr($last->chatDokterId, 2) + 1, 3, '0', STR_PAD_LEFT) : 'CD001';
                $chatDokter->chatDokterId = $nextId;
            }
        });
    }

    protected $fillable = [
        'chatDokterId',
        'customerId',
        'dokterId',   // ✅ benar
        'date',
        'status',
        'gambar',
        'price'
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
