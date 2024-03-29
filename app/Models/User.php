<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
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
    ];

    public function chauffeur()
    {
        return $this->hasOne(Chauffeur::class , 'user_id');
    }
    public function passager()
    {
        return $this->hasOne(passager::class);
    }
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function isAdmin()
    {
        return $this->admin !== null;
    }

    public function isChauffeur()
    {
        return $this->chauffeur !== null;
    }

    public function isPassager()
    {
        return $this->passager !== null;
    }
}
