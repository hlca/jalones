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
  
  public function newCar(Request $request){
    $car = new Car;
    $car->color_id = 1;
    $car->car_brand_id = 1;
    $car->car_model = $request->model;
    $car->line = $request->line;
    $car->available_spots = 10;
    $car->user_id = $request->user_id;
    $car->save();
    return response()->json(['data' => $car, 'success' => true]);
  }
  
}
