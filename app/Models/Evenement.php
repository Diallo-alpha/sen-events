<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'photo' ,'description', 'date_evenement', 'lieu', 'places_disponible', 'date_limite', 'organisme_id',
    ];

    public function organisme()
    {
        return $this->belongsTo(Organisme::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'reservations');
    }
}
