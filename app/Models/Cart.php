<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'customerId',
        'produkId',
        'qty'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produkId', 'produkId');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId', 'customerId');
    }

}

