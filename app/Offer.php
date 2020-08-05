<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
  public function offerable()
  {
      return $this->morphTo();
  }
}
