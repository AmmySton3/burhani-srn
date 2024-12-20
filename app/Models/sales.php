<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    // Define 'code' as the primary key
    protected $primaryKey = 'sales_id';

    protected $fillable = [
        'sales_id',
        'serial_no',
        'customer_name',
        'c_invoice_no',
        'status',
        'date_of_sales',
        'remarks',
    ];

    public function purchase()
    {
        return $this->belongsTo(purchase::class, 'serial_no');
    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_name');
    }
}
