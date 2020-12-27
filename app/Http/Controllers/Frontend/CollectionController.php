<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Groups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function index()
    {
        $groups = Groups::where('status', '0')->get();
        return view('layouts.index')
            ->with('groups', $groups)
    ;
    }
    public function groupview($group_url)
    {
        $groups = Groups::where('url', $group_url)->first();
        $group_id = $groups->id;

        $category = Category::where('group_id', $group_id)->where('status', '!=', '2')->where('status', '0')->get();
        return view('layouts.category')
            ->with('category', $category)
            ->with('group', $group)
        ;

    }
}
