<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'dokterId';
    public $incrementing = false;
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($dokter) {
            if (empty($dokter->dokterId)) {
                $last = static::orderBy('dokterId', 'desc')->first();
                $nextId = $last ? 'D' . str_pad((int)substr($last->dokterId, 1) + 1, 4, '0', STR_PAD_LEFT) : 'D0001';
                $dokter->dokterId = $nextId;
            }
        });
    }

    protected $fillable = [
        'dokterId',
        'dokterName',
        'namaBidang',
        'dokterAge',
        'jadwalPraktik',
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


