<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    public function product()
    {
        return $this->belongsTo('App\product');
    }
}
