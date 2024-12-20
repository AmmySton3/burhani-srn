<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_address',
        'customer_email',
        'customer_tel',
        'status',
    ];

    public function sales()
    {
        return $this->hasMany(sales::class, 'customer_name');
    }
}
