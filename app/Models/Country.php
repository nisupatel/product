<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }
}
