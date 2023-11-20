<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index(){

            $user_id=Auth::id();
            $cost = Order::where('user_id',$user_id)->sum('price');
        $orders = Order::with('product')->where('user_id',$user_id)->get();
    return view('cart',[ 'orders' => $orders,'cost'=>$cost]);

    }




        public function store($id){
            $product_id=$id;
            $product=Product::find($id);
            $user_id=Auth::id();

            $order=new Order;
            $order->product_id=$product_id;
            $order->user_id=$user_id;
            $order->price=$product->price;
            $order->save();
            return redirect()->back();
        }
            
    public function delete($order_id){
        $order = Order::find($order_id);
        if ($order != null) {
        $order->delete();
        return redirect()->back();}

    }

    public function update(Request $request, $id){
        $order_id=$id;
        $order=Order::findOrFail($order_id);
        $product_id=$order->product_id;
        $product=Product::findOrFail($product_id);
        $order->number=$request->number;
        
        if($product->number<$order->number)
        {return back()->with(['message' => 'Danger message']);
        }
        else{$newNumberProduct=$product->number - $order->number;
            $product->number=$newNumberProduct;
            $product->save();
            $order->save();
        }
        return redirect()->back();


    }
}
