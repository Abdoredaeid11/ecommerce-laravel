<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index(){
$Categories=Category::get()->all();
return view('category',['category' => $Categories]);

    }
}
