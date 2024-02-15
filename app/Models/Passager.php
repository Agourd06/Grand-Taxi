<?php

namespace App\Models;

use App\Models\traits\OnetoOneTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class passager extends User
{
    use HasFactory;
    use OnetoOneTrait;

    protected $fillable = [
        'phone',
        'user_id'
    ];
    public function reservation()
    {
        return $this->hasMany(reservation::class , 'passager_id');
    }
    public function route()
    {
        return $this->hasMany(route::class , 'passager_id');
    }
}
