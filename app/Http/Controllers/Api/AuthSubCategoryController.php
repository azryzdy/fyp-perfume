<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthSubCategoryController extends Controller
{
    function subcategory()
    {
        $subcategory = Subcategory::where('status', '!=', '3')->get();
        return $subcategory; 
    }   
}
