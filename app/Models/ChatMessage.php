<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_messages';
    public $timestamps = false;

    protected $fillable = [
    'chatDokterId',
    'customerId',
    'dokterId',
    'message',
    'sender_type',
    'chat_type', // 🔥 TAMBAHKAN
    'created_at'
];


    protected $casts = [
        'created_at' => 'datetime'
    ];

    // Relasi ke ChatDokter
    public function chatDokter()
    {
        return $this->belongsTo(ChatDokter::class, 'chatDokterId', 'chatDokterId');
    }
}
