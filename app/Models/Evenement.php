<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description', 'date_evenement', 'lieu', 'places_disponible', 'date_limite', 'photo', 'organisme_id',
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
