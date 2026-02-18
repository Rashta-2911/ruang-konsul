<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'adminId';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'adminId',
        'adminName',
        'adminEmail',
        'adminPassword',
        'adminAge',
    ];

    protected $hidden = ['adminPassword'];

    public function getAuthPassword()
    {
        return $this->adminPassword;
    }
}