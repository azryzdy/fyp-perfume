<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {
        $products = Products::where('status', '!=', '3')->get();
        return view('admin.collection.report.sales')
            ->with('products', $products)
        ;
        
    }
    public function edit(Request $request, $id)
    {
        $products = Products::find($id);
        $subcategory = Subcategory::where('status', '!=', '3')->get();
        return view('admin.collection.product.edit')
            ->with('products', $products)
            ->with('subcategory', $subcategory)
        ;
    }
    public function report(Request $request, $id)
    {
        $products = Products::find($id);
        $result = 0; 
        foreach ($products as $products) {
                $mainqty->quantity = $request->quantity;
                $mainprice->original_price = $request->original_price;
                $result->price = $mainqty+$mainprice;
            }
        foreach ($products as $products) { 
                $item2 = ($item->original_price * $item->quantity) + $item2;
        }

            
        //$mainprice = $products->original_price; 
    }
}
