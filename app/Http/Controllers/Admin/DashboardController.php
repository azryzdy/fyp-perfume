<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }
    public function registeredit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        Session::flash('statuscode', 'success');
        return view('admin.register-edit')->with('users', $users);
    }
    public function registerupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->username;
        $users->usertype = $request->usertype;
        $users->update();

        Session::flash('statuscode', 'success');
        return redirect('/role-register')->with('status','Your data is updated');
           
    }
    public function registerdelete(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        Session::flash('statuscode', 'error');
        return redirect('/role-register')->with('status','Your data is deleted');
    }
    
}
