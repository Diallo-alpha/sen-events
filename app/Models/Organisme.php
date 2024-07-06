<?php
namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organisme extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $guard_name = 'organisme';

    protected $fillable = [
        'nom', 'description', 'logo', 'adresse', 'secteur_activite', 'ninea', 'date_creation', 'email', 'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
