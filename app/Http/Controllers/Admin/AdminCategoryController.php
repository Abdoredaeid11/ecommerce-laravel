<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    //
    public function index()
    {
        //
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }
}
