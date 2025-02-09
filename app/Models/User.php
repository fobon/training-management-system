<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

// class User extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//         'username',
//         'phone',
//         'company',
//         'role',
//         'DOB',
//         'password',

//     ];

// }


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    const ROLE_ADMIN = 'Admin';
    const ROLE_NORMAL_USER = 'Normal user';

    protected $fillable =
    [
                'name',
                'email',
                'password',
                'username',
                'phone',
                'company',
                'role',
                'DOB',
                'password',
                'image',

            ];

    protected $hidden =
    [
        'password',
        'remember_token',
    ];

    protected $casts =
    [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function isUser()
    {
        return $this->role === 'Normal user';
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
