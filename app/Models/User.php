<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

         // Define 'code' as the primary key
    protected $primaryKey = 'user_id';

        // If 'code' is not an integer, set key type to string
    protected $keyType = 'string';
        
        // Disable auto-incrementing since 'code' is not an integer
    public $incrementing = false;

    protected $fillable = [
        'user_id','password','role_id','status', 'first_name','last_name','tel','email', 'address','login_at','created_by','updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles(){
        return $this->belongsTo(roles::class, 'role_id');
    }
}
