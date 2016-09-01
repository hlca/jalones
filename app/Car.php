<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  public function car_brand(){
  	return $this->belongsTo('App\CarBrand');
  }

  public function color(){
  	return $this->belongsTo('App\Color');
  }

  public function user(){
  	return $this->belongsTo('App\User');
  }
}
