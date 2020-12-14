<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->ename = $request->ename;
        $employee->epost = $request->epost;
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/employee/'.$filename);//ni kat public
            $employee->image = $filename;
        }else{
            return $request;
            $highlights->image = '';
        }
        $employee->save();

        return view('/admin.dashboard');
    }
}
