<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = 'customer';
    protected $primaryKey = 'customerId';

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // karena tabel tidak ada created_at & updated_at

    protected $fillable = [
        'customerId',
        'customerName',
        'customerEmail',
        'customerPassword',
        'alamat',
        'customerNoTelp',
        'customerJenisKelamin',
        'avatar',
    ];

    protected $hidden = [
        'customerPassword',
        'remember_token', // jika nanti kamu pakai remember me
    ];

    /**
     * Supaya Laravel tahu email login pakai kolom customerEmail
     */
    public function getAuthIdentifierName()
    {
        return 'customerEmail';
    }

    /**
     * Supaya Laravel tahu password pakai kolom customerPassword
     */
    public function getAuthPassword()
    {
        return $this->customerPassword;
    }
}
