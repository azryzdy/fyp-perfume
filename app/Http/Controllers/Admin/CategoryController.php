<?php

namespace App\Http\Controllers\Admin;

use App\Models\Groups;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('status', '!=', '3')->get();
        return view('admin.collection.category.index')
            ->with('category', $category)
        ;
    }
    public function create()
    {
        $group = Groups::where('status', '!=', '3')->get(); //3->Deleted Data
        return view('admin.collection.category.create')
            ->with('group', $group)
        ;
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->group_id = $request->group_id;
        $category->url = $request->url;
        $category->name = $request->name;
        $category->description = $request->description;
        if($request->hasfile('category_img'))
        {
            $image_file = $request->file('category_img');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time() . ' .  '. $img_extension;
            $image_file->move('uploads/categoryimage/', $img_filename);
            $category->image=$img_filename;
        }else{
            $category->image = $request->image;
        }
        if($request->hasfile('category_icon'))
        {
            $icon_file = $request->file('category_icon');
            $icon_extension = $icon_file->getClientOriginalExtension();
            $icon_filename = time() . ' . ' . $icon_extension;
            $icon_file->move('uploads/categoryicon/', $icon_filename);
            $category->icon=$icon_filename;
        }
        $category->status = $request->input('status') == true ? '1':'0'; // 0=show | 1=hidden
        $category->save();

        return redirect()->back()->with('status','Category Added Successfully');
    }
    public function edit($id)
    {
        $group = Groups::where('status', '!=', '3')->get();//3= deleted dates
        $category = Category::find($id);
        return view('admin.collection.category.edit')
            ->with('group', $group)
            ->with('category', $category)
        ;
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->group_id = $request->group_id;
        $category->url = $request->url;
        $category->name = $request->name;
        $category->description = $request->description;
        if($request->hasfile('category_img'))
        {
            $filepath_image = 'uploads/categoryimage/'.$category->image;
            if(File::exists($filepath_image)){
                File::delete($filepath_image);
            }
            $image_file = $request->file('category_img');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time() . ' .  '. $img_extension;
            $image_file->move('uploads/categoryimage/', $img_filename);
            $category->image=$img_filename;
        }else{
            $category->image = $request->image;
        }
        if($request->hasfile('category_icon'))
        {
            $filepath_icon = 'uploads/categoryimage/'.$category->icon;
            if(File::exists($filepath_icon)){
                File::delete($filepath_icon);
            }
            $icon_file = $request->file('category_icon');
            $icon_extension = $icon_file->getClientOriginalExtension();
            $icon_filename = time() . ' . ' . $icon_extension;
            $icon_file->move('uploads/categoryicon/', $icon_filename);
            $category->icon=$icon_filename;
        }
        $category->status = $request->input('status') == true ? '1':'0'; // 0=show | 1=hidden
        $category->update();

        return redirect()->back()->with('status','Category Update Successfully');
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->status = '3'; //3 = Deleted Records
        $category->update();
        return redirect()->back()->with('status','Category Deleted Successfully');

    }
}
