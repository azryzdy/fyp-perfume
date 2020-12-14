<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Servicecategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Servicecategory::all();
        return view('admin.services.index')
            ->with('services', $services)
        ;
    }
    public function create()
    {
        return view('admin.services.create');
    }
    public function store(Request $request)
    {
        $category = new Servicecategory();
        $category->service_name = $request->service_name;
        $category->service_description = $request->service_description;
        $category->save();
        
        return view('admin.services.index');
    }
    public function edit($id)
    {
        $service_category = Servicecategory::find($id);

        return view('admin.services.edit')->with('service_category', $service_category);
    }
    public function update(Request $request, $id)
    {
        $serv_cate = Servicecategory::find($id);
        $serv_cate->service_name = $request->service_name;
        $serv_cate->service_description = $request->service_description;
        $serv_cate->update();

        Session::flash('statuscode', 'success');
        return redirect('service-category')->with('status', 'Service Category Updated');
    }
    public function catedelete(Request $request, $id)
    {
        $serv_cate = Servicecategory::findOrFail($id);
        $serv_cate->delete();
        Session::flash('statuscode', 'success');
        return redirect('service-category')->with('status', 'Service Category Deleted');
        
    }
}
