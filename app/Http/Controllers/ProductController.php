<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 
    //
 public function index($categoryId){
        
$products=Product::where('category_id', $categoryId)->get();
return view('product',['products'=>$products]);
}
}