<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['restaurant_id','category_id','name','price','description','slug','active'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
    public function gallery()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function additions()
    {
        return $this->morphMany('App\Addition', 'additionable');
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function variants()
    {
        return $this->hasMany('App\Variant');
    }
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute', 'valueables','product_id','attribute_id' );
    }
    public function offer()
    {
        return $this->hasOne('App\offer');
    }
}
