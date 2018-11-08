<?php

namespace Caisse;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{


    protected $fillable =['malimentes', 'old_somme', 'somme'];

    public function users()
    {
        return $this->belongsTo("Caisse\User");
    }

    public function agence()
    {
        return $this->belongsTo("Caisse\Agence");
    }
}
