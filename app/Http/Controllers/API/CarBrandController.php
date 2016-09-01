<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CarBrand;

class CarBrandController extends Controller
{
  public function index(){
  	return response()->json([
  		'success' => true,
  		'message' => 'Car Brands retrieved successfully',
  		'data' => CarBrand::all()
  	]);
  }
}
