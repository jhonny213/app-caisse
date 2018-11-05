<?php

namespace Caisse;

use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{


    protected $fillable =['machat', 'prix', 'validation', 'desc'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
