<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'dokterId';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'dokterId',
        'dokterName',
        'namaBidang',
        'dokterAge',
        'jenisKelamin',
        'gambar',
        'hargaKonsultasi',
    ];

    public function chatDokter()
    {
        return $this->hasMany(
            ChatDokter::class,
            'DokterdokterId',
            'dokterId'
        );
    }
}


