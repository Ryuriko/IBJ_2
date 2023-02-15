<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{	
    public function registrasi(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required',
			'password' => 'required'
		]);
		
		if($validator->fails()) {
			return response()->json([
				"success" => false,
				"message" => "Registration Failed",
				"data" => $validator->errors(),
				"request" => $request->all()
			]);
		}
		
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$user = Admin::create($input);
		
		$success['name'] = $user->name;
		$success['token'] = $user->createToken('auth_token')->plainTextToken;
		
		return response()->json([
			"success" => true,
			"message" => "Registration Successfully",
			"data" => $success
		]);
	}
	
	public function login(Request $request)
	{
		if(Auth::attempt(["email" => $request->email, "password" => $request->password])) {
			$auth = Auth::user();
			$success['token'] = $auth->createToken('auth_token')->plainTextToken;
			$success['name'] = $auth->name;
			
			return response()->json([
				"success" => true,
				"message" =>"Login Successfully",
				"data" => $success
			]);
		} else {
			return response()->json([
				"success" => false,
				"message" => "Login Failed",
				"data" => null
			]);
		}
	}
}
