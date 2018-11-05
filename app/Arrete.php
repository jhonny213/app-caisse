<?php

namespace Caisse;

use Illuminate\Database\Eloquent\Model;

class Arrete extends Model
{
    protected $fillable = ['1_da', '2_da', '5_da', '10_da', '20_da', '50_da', '100_da', '200_da', '500_da', '1000_da', '2000_da', 'sold_achats'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
