<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function valueable()
    {
        return $this->hasMany('App\valueable');
    }
    public function attributes()
    {
        return $this->belongsToMany('App\attribute');
    }
}
