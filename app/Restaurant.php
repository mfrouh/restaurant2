<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  protected $fillable=['name','description','delivery','address','phone','state','price_delivery','time_delivery'];
  protected $appends=['categories'];
  public function products()
  {
      return $this->hasMany('App\Product');
  }
  public function selectproducts()
  {
      return $this->hasMany('App\Product')->select(['id']);
  }
  public function getCategoriesAttribute()
  {
    $categories=Product::whereIn('id',$this->selectproducts)->pluck('category_id');
    $category=Category::whereIn('id',$categories)->select(['id','name','active'])->get();
    return $category;
  }
  public function categories()
  {
      $categories=Product::whereIn('id',$this->products)->pluck('category_id');
      $category=Category::whereIn('id',$categories)->select(['name','active'])->get();
      return $category;
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
