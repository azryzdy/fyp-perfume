<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Products; 
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AuthProductController extends Controller
{
    function list()
    {
        $product = Products::where('status', '!=', '3')->get();
        return $product;
    }
   
}
