<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{

     protected $fillable = [
        'description',
     ];

    public function User(){
        return $this->hasMany(user::class, 'role_id');
    } 
}
