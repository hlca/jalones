<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Route;

class RouteController extends Controller
{
  public function newRoute(Request $request){
  	$route = new Route;
  	$route->car_id = $request->car_id;
  	$route->puller_id = $request->puller_id;
  	$route->route = $request->route;
  	$route->route_start = $request->route_start;
  	$route->name = $request->name;
  	$route->description = $request->description;
  	$route->spaces = $request->spaces;
  	$route->save();


  	return response()->json([
	    'success' => true,
	    'message' => 'Route added successfully',
	    'data' => $route->id
		]);
  }

  public function index(){
  	return response()->json([
	    'success' => true,
	    'message' => 'Route added successfully',
	    'data' => Route::all()
		]);
  }
}
