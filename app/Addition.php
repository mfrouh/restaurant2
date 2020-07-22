<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    protected $fillable=['name','type','price','additionable_id','additionable_type'];

    public function additionable()
    {
        return $this->morphTo();
    }
}
