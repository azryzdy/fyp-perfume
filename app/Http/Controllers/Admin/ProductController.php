<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::where('status', '!=', '3')->get();
        return view('admin.collection.product.index')
            ->with('products', $products)
        ;
    }
    public function create()
    {
        $subcategory = Subcategory::where('status','!=','3')->get();
        return view('admin.collection.product.create')
            ->with('subcategory', $subcategory)
        ;
    }

    public function store(Request $request)
    {
        $products = new Products();
        $products->name = $request->name;
        $products->sub_category_id = $request->sub_category_id;
        $products->url = $request->url;
        $products->small_description = $request->small_description;

        if($request->hasfile('prod_image'))
        {
            $image_file = $request->file('prod_image');
            $img_extension = $image_file->getClientOriginalExtension(); // getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/products/', $img_filename);
            $products->image = $img_filename;
        }

        $products->sale_tag = $request->saletag;
        $products->original_price = $request->original_price;
        $products->offer_price = $request->offer_price;
        $products->quantity = $request->quantity;
        $products->priority = $request->priority;

        $products->p_highlight_heading = $request->p_highlight_heading;
        $products->p_highlights = $request->p_highlights;
        $products->p_description_heading = $request->p_description_heading;
        $products->p_description = $request->p_description;
        $products->p_details_heading = $request->p_details_heading;
        $products->p_details = $request->p_details;

        $products->meta_title = $request->meta_title;
        $products->meta_description = $request->meta_description;
        $products->meta_keyword = $request->meta_keyword;

        $products->new_arrival_products = $request->input('new_arrival') == true ? '1':'0';
        $products->featured_products = $request->input('featured_products') == true ? '1':'0';
        $products->popular_products = $request->input('popular_products') == true ? '1':'0';
        $products->offers_products = $request->input('offers_products') == true ? '1':'0';
        $products->status = $request->input('status') == true ? '1':'0';

        $products->save();
        return redirect()->back()->with('status','Product Successfully Added.!');
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
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        $products->name = $request->name;
        $products->sub_category_id = $request->sub_category_id;
        $products->url = $request->url;
        $products->small_description = $request->small_description;

        if($request->hasfile('prod_image'))
        {
            $image_file = $request->file('prod_image');
            $img_extension = $image_file->getClientOriginalExtension(); // getting image extension
            $img_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/products/', $img_filename);
            $products->image = $img_filename;
        }

        $products->sale_tag = $request->saletag;
        $products->original_price = $request->original_price;
        $products->offer_price = $request->offer_price;
        $products->quantity = $request->quantity;
        $products->priority = $request->priority;

        $products->p_highlight_heading = $request->p_highlight_heading;
        $products->p_highlights = $request->p_highlights;
        $products->p_description_heading = $request->p_description_heading;
        $products->p_description = $request->p_description;
        $products->p_details_heading = $request->p_details_heading;
        $products->p_details = $request->p_details;

        $products->meta_title = $request->meta_title;
        $products->meta_description = $request->meta_description;
        $products->meta_keyword = $request->meta_keyword;

        $products->new_arrival_products = $request->input('new_arrival') == true ? '1':'0';
        $products->featured_products = $request->input('featured_products') == true ? '1':'0';
        $products->popular_products = $request->input('popular_products') == true ? '1':'0';
        $products->offers_products = $request->input('offers_products') == true ? '1':'0';
        $products->status = $request->input('status') == true ? '1':'0';

        $products->update();
        return redirect()->back()->with('status','Product Successfully Added.!');
    }
    public function delete($id)
    {
        $products = Products::find($id);
        $products->status = "3";
        $products->update();
        return redirect()->back()->with('status','Data deleted');
    }
    public function deletedrecords()
    {
        $products = Products::where('status', '3')->get();
        return view('admin.collection.product.deleted')
            ->with('products', $products)
        ;
    }
    public function deletedrestore($id)
    {
        $products = Products::find($id);
        $products->status = "0"; //0->show 1->hide, 2->delete
        $products->update();
        return redirect('products')->with('status', 'Data Restored');
    }
    
}
