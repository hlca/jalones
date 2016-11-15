<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\UserEmail;

use Hash;

class UserController extends Controller
{

	public function authenticate(Request $request){
		$user = User::where('username', $request->username)->first();
		if($user != null){
			if (Hash::check($request->password, $user->password)) {
	    // The passwords match...
			//if (Auth::attempt(['username' => $request->username, 'password' => ])) {
	      return response()->json(['success' => true]);
	    }	
		}
		
    return response()->json(['success' => false]);
	}
	public function addEmail(Request $request){
		$user = User::find($request->user_id);

		$userEmail = new UserEmail;
		$userEmail->user_id = $user->id;
		$userEmail->organization_id = 1;
		$userEmail->email = $request->email;

		$userEmail->save();

		return response()->json([
	    'success' => true,
	    'message' => 'Email added successfully',
	    'data' => $userEmail
		]);
	}

	public function updateEmail(Request $request){
		$userEmail = UserEmail::find($request->user_email_id);

		$userEmail->email = $request->email;
		$userEmail->organization_id = 1;

		$userEmail->save();

		return response()->json([
			'success' => true,
			'message' => 'Email updated successfully',
			'data' => $userEmail
		]);
	}

	public function removeEmail(Request $request){
		$userEmail = UserEmail::find($request->user_email_id);
		$userEmail->delete();

		return response()->json([
	    'success' => true,
	    'message' => 'Email removed successfully',
	    'data' => $request->user_email_id
		]);
	}

	public function show(Request $request){
	  return $request->user();
	}

	public function get(Request $request){
		return response()->json([
	    'success' => false,
	    'message' => 'Password does not match',
	    'data' => User::where('id', $request->user_id)->first()
		]);
	}

	public function update(Request $request){
		if($request->password == $request->confirmPassword){
			$user = new User;
			$user->name = $request->name;
			$user->username = $request->username;
	  	$user->address = $request->address;
	  	$user->phone = $request->phone;

			if($request->password != ""){
				//Va a cambiar la contraseña
				$user->password = bcrypt($request->password);
			}

			$user->save();

			return response()->json([
			    'success' => true,
			    'message' => 'User updated successfully',
			    'data' => $user
				]);
		}
		return response()->json([
	    'success' => false,
	    'message' => 'Password does not match',
	    'data' => []
		]);
	}

  public function create(Request $request){
  	if($request->password == $request->confirmPassword){

  		$haveUsername = User::where('username', $request->username)->count();

  		if($haveUsername == 0){
  			$user = new User;
		  	$user->name = $request->name;
		  	$user->password = bcrypt($request->password);
		  	$user->username = $request->username;
		  	$user->address = $request->address;
		  	$user->phone = $request->phone;
		  	$user->save();

		  	$userEmail = new UserEmail;
		  	$userEmail->user_id = $user->id;
		  	$userEmail->organization_id = 1;
		  	$userEmail->email = $request->email;
		  	$userEmail->save();

		  	return response()->json([
			    'success' => true,
			    'message' => 'User saved successfully',
			    'data' => $user
				]);
  		}

  		return response()->json([
		    'success' => false,
		    'message' => 'Username already exists',
		    'data' => []
			]);
  	}

  	return response()->json([
	    'success' => false,
	    'message' => 'Password does not match',
	    'data' => []
		]);
  	
  }
}
