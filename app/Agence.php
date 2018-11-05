<?php

namespace Caisse;

use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    protected $fillable =['name', 'wilaya', 'adresse', 'tel', 'caisse', 'banque'];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
