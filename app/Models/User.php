<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new ResetPasswordNotification);
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function hotelInquiries()
    {
        return $this->hasMany(HotelInquiry::class);
    }
    public function cabInquiries()
    {
        return $this->hasMany(CabInquiry::class);
    }
    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }
    public function addresses()
    {
        // Assuming you have a 'user_id' foreign key in your 'user_addresses' table
        return $this->hasMany(UserAddress::class, 'user_id');
    }
    public function orders()
    {
        // Assuming you have a 'user_id' foreign key in your 'user_addresses' table
        return $this->hasMany(Order::class, 'user_id');
    }
}