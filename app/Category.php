<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

}
 