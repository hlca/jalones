<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Car;

class CarController extends Controller
{
  public function getCar(Request $request){
  	$car = Car::with('color')->with('car_brand')->with('user')->where('id', $request->car_id)->first();
  	return response()->json(['data' => $car]);
  }
}
