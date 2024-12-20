<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    // Define 'code' as the primary key
    protected $primaryKey = 'serial_no';

        // If 'code' is not an integer, set key type to string
    protected $keyType = 'string';
        
        // Disable auto-incrementing since 'code' is not an integer
    public $incrementing = false;

    protected $table = 'purchases';

    protected $fillable = [
        'serial_no',
        'model_no',
        'name',
        'company',
        'invoice_no',
        'date_of_purchase',
        'vendor_name',
        'status',
        'remarks',
    ];

    public function sales()
    {
        return $this->hasMany(sales::class, 'serial_no');
    }

    public function vendor()
    {
        return $this->belongsTo(vendor::class, 'vendor_name');
    }
}
