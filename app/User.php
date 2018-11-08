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
        'nom', 'prenom', 'groupe', 'password','agence_id'
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
        return $this->hasManyThrough("Caisse\Agence");
    }

    public function achats()
    {
        return $this->hasMany("Caisse\Achat");
    }

    public function aliments()
    {
        return $this->hasMany("Caisse\Alimente");
    }

    public function arretes()
    {
        return $this->hasMany("Caisse\Arrete");
    }

}
