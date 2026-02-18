<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAppointment extends Model
{
    use HasFactory;

    // Nama tabel sesuai database
    protected $table = 'formAppointment';

    // Primary key
    protected $primaryKey = 'appointmentId';

    // Primary key bukan auto increment
    public $incrementing = false;

    // Tipe primary key
    protected $keyType = 'string';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'appointmentId',
        'customerId',
        'dokterId',
        'date',
        'time',
        'pesan'
    ];

    // Nonaktifkan timestamp jika tabel tidak punya created_at & updated_at
    public $timestamps = false;
}
