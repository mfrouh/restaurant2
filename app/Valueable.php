<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valueable extends Model
{
    public function product()
    {
        return $this->belongsTo('App\product');
    }
    public function Option()
    {
        return $this->belongsTo('App\Option');
    }
    public function attribute()
    {
        return $this->belongsTo('App\attribute');
    }
    public function variants()
    {
        return $this->belongsToMany('App\variant');
    }
}
