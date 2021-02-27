<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthCategoryController extends Controller
{
    function category()
    {
        $category = Category::where('status', '!=', '3')->get();
        return $category; 
    }   
}
