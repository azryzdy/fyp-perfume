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
    function image(Request $request, $id)
    {
        $products = Products::find($id);
        if($request->hasfile('prod_image'))
        {
            $image_file = $request->file('prod_image');
            $img_extension = $image_file->getClientOriginalExtension(); // getting image extension
            $img_filename = time() . '.' . $img_extension;
            $storagePath = storage_path('uploads/products/', $img_filename);
            return Image::make($storagePath)->response();
        }
        
        
        
    }
}
