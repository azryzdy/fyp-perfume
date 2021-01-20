<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
class SubcategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('status', '!='. '3')->get();
        $subcategory = Subcategory::where('status', '!=', '3')->get(); //3= deleted
        return view('admin.collection.subcategory.index')
            ->with('subcategory', $subcategory)
            ->with('category', $category)
        ;
    }
    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->url = $request->url;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        if($request->hasfile('image'))
        {
            $image_file = $request->file('image');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time() . ' .  '. $img_extension;
            $image_file->move('uploads/subcategory/', $img_filename);
            $subcategory->image=$img_filename;
        }else{
            $subcategory->image = $request->image;
        }
        $subcategory->priority = $request->priority;
        $subcategory->status = $request->input('status')==true ?'1':'0';
        $subcategory->save();

        return redirect()->back()->with('status', 'Subcategory Saved Successfully');
    }
    public function edit(Request $request, $id)
    {
        $category = Category::where('status', '!='. '3')->get();
        $subcategory = Subcategory::find($id);
        return view('admin.collection.subcategory.edit')
            ->with('subcategory', $subcategory)
            ->with('category', $category)
        ;

    }
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->url = $request->url;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        if($request->hasfile('image'))
        {
            $filepath_image = 'uploads/subcategory/'.$subcategory->image;
            if(File::exists($filepath_image)){
                File::delete($filepath_image);
            }
            $image_file = $request->file('image');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time() . ' .  '. $img_extension;
            $image_file->move('uploads/subcategory/', $img_filename);
            $subcategory->image=$img_filename;
        }else{
            $subcategory->image = $request->image;
        }
        $subcategory->priority = $request->priority;
        $subcategory->status = $request->input('status')==true ?'1':'0';
        $subcategory->update();

        return redirect('/sub-category')->with('status', 'Subcategory Saved Successfully');
    }
    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->status = '3';
        $subcategory->update();

        return redirect()->back()->with('status', 'Sub-Category Deleted Successfully');
    }
    public function deletedrecords()
    {
        $subcategory = Subcategory::where('status', '3')->get();
        return view('admin.collection.subcategory.deleted')
            ->with('subcategory', $subcategory)
        ;
    }
    public function deletedrestore($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->status = "0"; //0->show 1->hide, 2->delete
        $subcategory->update();
        return redirect('sub-category')->with('status', 'Data Restored');
    }
}
