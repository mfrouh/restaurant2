<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function gallery()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function offer()
    {
        return $this->morphOne('App\Offer', 'offerable');
    }
    
    public function valueables()
    {
        return $this->belongsToMany('App\Valueable', 'variant_valueable','variant_id','valueable_id');
    }
    
    public function additions()
    {
        return $this->morphMany('App\Addition', 'additionable');
    }
}
