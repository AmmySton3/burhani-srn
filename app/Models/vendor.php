<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $fillable = [
        'vendor_name',
        'vendor_email',
        'vendor_address',
        'vendor_tel',
        'status',
    ];

    public function purchase()
    {
        return $this->hasMany(purchase::class, 'vendor_name');
    }
}
