<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description', 'logo', 'adresse', 'secteur_activite', 'ninea', 'date_creation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
