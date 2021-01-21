<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nameDOB' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
            ]);
          
          $user = User::create([
            'name' => $request->name,
            'nameDOB' => $request->nameDOB,
            'email' => $request->email,
            'password' => Hash::make($request->password),
          ]);
          
          return response()->json(["token" => $user->createToken($request->device_name)->plainTextToken], 200);//firstimer
    }
    public function getToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        return response()->json(["token" => $user->createToken($request->device_name)->plainTextToken], 200);//different token everytime login no need to save token
    }
}
