<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  protected $fillable=['name','description','delivery','address','phone','state','price_delivery','time_delivery'];

  public function products()
  {
      return $this->hasMany('App\Product');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function image()
  {
     return $this->morphOne('App\Image', 'imageable');
  }

  public function rate()
  {
      return $this->morphMany('App\Rate', 'rateable');
  }

  public function review()
  {
      return $this->morphMany('App\Review', 'reviewable');
  }
  public function employees()
  {
      return $this->hasMany('App\Employee');
  }


}
