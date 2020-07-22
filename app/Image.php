<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['url','imageable','imagetype'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
