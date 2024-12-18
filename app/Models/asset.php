<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    protected $fillable = [
        'serial_no',
        'sales_id',
        'status',
    ];

    public function sales()
    {
        return $this->hasOne(Sales::class, 'sales_id');
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'serial_no');
    }
}
