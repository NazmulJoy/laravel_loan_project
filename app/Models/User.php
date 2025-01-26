<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password', 
        'mobile_number',
        'present_address',
        'state',
        'city',
        'postal_code',
        'marital_status',
        'date_of_birth',
        'yearly_salary',
        'profession',
        'image',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
