<?php

namespace App\Models;

use App\Models\traits\OnetoOneTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chauffeur extends User
{
    use HasFactory;
    use OnetoOneTrait;
    
    protected $fillable = [
        'Description',
        'immatricule',
        'Desponability',
        'VoitureType',
        'TypeDePayment',
        'user_id',
    ];
    
    public function reservation()
    {
        return $this->hasMany(reservation::class , 'Chauffeur_id');
    }
    public function route()
    {
        return $this->hasMany(route::class , 'Chauffeur_id');
    }
}
