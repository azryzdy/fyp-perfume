<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Products; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthProductController extends Controller
{
    function list()
    {
        $product = Products::where('status', '!=', '3')->get();
        return $product;
        return response()->json(["token" => $product->createToken($request->device_name)->plainTextToken], 200);
    }
}
