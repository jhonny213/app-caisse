<?php

namespace Caisse;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable =['id', 'name', 'wilaya', 'adresse', 'tel', 'caisse', 'banque'];
    public function users()
    {
        return $this->hasMany("Caisse\User");
    }

    public function fournisseurs(){
        return $this->hasManyThrough('Fournisseurs', 'User','agence_id','user_id');

    }
    public function fournitures(){
        return $this->hasManyThrough('Fournisseurs', 'User','agence_id','user_id');
    }

}
