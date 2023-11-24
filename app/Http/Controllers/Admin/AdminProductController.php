<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller
{
    //
    public function index($id)
    {
        //
        
        $products=Product::where('category_id',$id)->get();
        return view('admin.product.index',['products'=>$products]);
    }
}
