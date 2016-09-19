<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comentary;

class ComentaryController extends Controller
{
  public function addComentary(Request $request){
  	$comentary = new Comentary;
  	$comentary->route_id = $request->route_id;
  	$comentary->user_id = $request->user_id;
  	$comentary->comentary = $request->comentary;
  	$comentary->rating = $request->rating;

  	$comentary->save();

  	return request()->json([
  		'success' => true,
  		'message' => 'Comentary added successfully',
  		'data' => $comentary
  	]);
  }
}
