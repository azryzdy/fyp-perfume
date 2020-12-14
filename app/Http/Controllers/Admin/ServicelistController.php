<?php

namespace App\Http\Controllers\Admin;

use App\Models\Servicelist;
use Illuminate\Http\Request;
use App\Models\Servicecategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ServicelistController extends Controller
{
    public function index()
    {
        $service_category = Servicecategory::all();
        $service_list = Servicelist::all();
        return view('admin.service-list.index')
            ->with('service_category', $service_category)
            ->with('service_list', $service_list)
        ;
    }
    public function store(Request $request)
    {
        $serlist = new Servicelist();
        $serlist->serv_cate_id = $request->serv_cate_id;
        $serlist->title = $request->title;
        $serlist->description = $request->description;
        $serlist->amount = $request->amount;
        $serlist->price = $request->price;
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/employee/'.$filename);
            $serlist->image = $filename;
        }else{
            $serlist->image = $request->image;
        }
        $serlist->save();
        
        return redirect()->back()->with('status', 'Service List is added');
    }
    public function edit($id)
    {
        $ser_list = Servicelist::find($id);
        $service_category = Servicecategory::all();
        return view('admin.service-list.edit')
            ->with('ser_list',$ser_list)
            ->with('service_category',$service_category)
        ;
    }
    public function update(Request $request, $id)
    {
        $serv_list = Servicelist::find($id);
        $serv_list->serv_cate_id = $request->serv_cate_id;
        $serv_list->title = $request->title;
        $serv_list->description = $request->description;
        $serv_list->amount = $request->amount;
        $serv_list->price = $request->price;
        $serv_list->update();

        return redirect('/service-list')->with('status','Product List Updated');
    }
    public function listadd(Request $request, $id)
    {
        $serlist = new Servicelist($id);
        $serv_list->serv_cate_id = $request->serv_cate_id;
        $serlist->amount = $request->amount;
        $serlist->price = $request->price;
        $serlist->save();
        
        return redirect('/service-list')->back()->with('status', 'Service List is added');
    }
    public function listdelete(Request $request, $id)
    {
        $ser_list = Servicelist::findOrFail($id);
        $ser_list->delete();
        Session::flash('statuscode', 'success');
        return redirect('service-list')->with('status', 'Product List Deleted');
    }

}
