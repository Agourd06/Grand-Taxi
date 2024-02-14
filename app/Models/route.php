<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip',
        'date',
        'note',
        'Chauffeur_id',
        'passager_id',
        'reservation_id'
    ];
    public function chauffeur()
    {
        return $this->belongsTo(chauffeur::class, 'chauffeur_id');
    }

    public function passager()
    {
        return $this->belongsTo(passager::class, 'passager_id');
    }
}
