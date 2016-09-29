<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Puller;
use App\User;

class PullerController extends Controller {
  public function activatePuller(Request $request){
  	$user = User::find($request->user_id);
  	$user->jalador = 1;
  	$user->save();
  	
  	$puller = Puller::where('id', $request->puller_id);

  	if($puller->count() === 0){
  		//No existe
  		$p = new Puller;
  		$p->user_id = $user->id;
  		$p->dpi = $request->dpi;
  		$p->licence = $request->licence;
  		$p->save();
  	}else{
  		$p = $puller->first();
  		$p->dpi = $request->dpi;
  		$p->licence = $request->licence;
  		$p->save();
  	}
  	
  	return response()->json([
  		'success' => true,
  		'message' => 'Puller activated successfully',
  		'data' => $user
  	]);
  }

  public function deactivatePuller(Request $request){
  	$user = User::find($request->user_id);
  	$user->jalador = 0;
  	$user->save();

  	return response()->json([
  		'success' => true,
  		'message' => 'Puller deactivate successfully',
  		'data' => $user
  	]);
  }
}
