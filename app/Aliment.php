<?php

namespace Caisse;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{


    protected $fillable =['malimentes', 'old_somme', 'somme'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
