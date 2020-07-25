<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  protected $fillable=['name','description','delivery','address','phone','state'];

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
  
}
