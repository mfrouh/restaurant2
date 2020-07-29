<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function reviewable()
    {
        return $this->morphTo('');
    }
}
