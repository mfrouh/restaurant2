<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
