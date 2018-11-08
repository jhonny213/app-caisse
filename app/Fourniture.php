<?php

namespace Caisse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Fourniture extends Model
{
    use SoftDeletes;
    public function agences(){
        return $this->belongsTo("Caisse\Agence");
    }
    protected $dates = ['deleted_at'];
}
