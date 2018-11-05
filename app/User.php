<?php

namespace Caisse;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const DIRECTEUR = 'Directeir';
    const GESTIONNAIRE = 'Gestionnaire';
    protected $fillable = [
        'nom', 'prenom', 'username', 'groupe', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function agences()
    {
        return $this->belongsTo('Agence');
    }

    public function achats()
    {
        return $this->hasMany(Achat::class);
    }

    public function aliments()
    {
        return $this->hasMany(Aliment::class);
    }

    public function arretes()
    {
        return $this->hasMany(Arrete::class);
    }

}
