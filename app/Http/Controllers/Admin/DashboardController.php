<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $orders=Order::count();
        $users=User::count();
        $products=Product::count();
        $categories=Category::count();
        return view('admin.dashboard.dashboard',['categories'=>$categories,'products'=>$products,'users'=>$users,'orders'=>$orders]);
    }

}
