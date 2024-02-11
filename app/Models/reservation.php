<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip',
        'date',
        'Chauffeur_id',
        'passager_id'
    ];
    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }
    public function passager()
    {
        return $this->belongsTo(passager::class);
    }
}
