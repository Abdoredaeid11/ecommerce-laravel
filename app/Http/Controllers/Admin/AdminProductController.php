<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;

class AdminProductController extends Controller
{
    //////////// index////////////////

    public function index($id)
    {
        //
        
        $products=Product::where('category_id',$id)->get();
        $categoryIds = $products->pluck('category_id');
        $category_id=$categoryIds->first();
        return view('admin.product.index',['products'=>$products , 'category_id'=>$category_id]);
    }

    //////////// create////////////////

    public function create($id)
    {
        //$categoryIds = $products->pluck('category_id');
$category_id=$id;
        return view('admin.product.create',[ 'category_id'=>$category_id]);
    }

    //////////// Store////////////////
    public function store(storeProductRequest $request)
    {
        
        
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $product=new Product();
            $product->name=$request->name;
            $product->price=$request->price;
            $product->description=$request->description;
            $product->image=$filename;
            $product->popular=$request->popular ? '1':'0';
            $product->status=$request->status ? '1':'0';
            $product->number=$request->number;
            $product->category_id=$request->category_id;
            $product->save();
            $file->move('assets/img/products', $filename);

         return redirect()->back();
        }
        
    }


        //////////// Edit////////////////
        public function edit($id)
        {
            //
            $product_id=$id;
            $product=Product::findOrFail($product_id);
            return view('admin.product.edit',['product'=>$product]);
        }


        //////////// Update////////////////

        public function update(storeProductRequest $request,$id)
        {
            $product=Product::find($id);
            try {
    
              // $vaildated=$request->vaildated(); ?????????????
             
                 $fileName=$product->image;
                
                 if ($fileName) {
                    $filePath = public_path("assets/img/products/$fileName");
    
                    if (file_exists($filePath)) {
                        unlink($filePath);
    
                    }}
    
                    $file = $request->file('image');
                    $extenstion = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extenstion;
                    $file->move('assets/img/products', $filename);
                        $product->name = $request->name;
                        $product->popular=$request->popular?'1':'0';
                        $product->status=$request->status?'1':'0';
                        $product->number=$request->number;
                        $product->price=$request->price;
                        $product->description = $request->description;
                        $product->image = $filename;
                        $product->save();
               
            return redirect()->url('admin/product/index');
               
                //code...
            } catch (\Exception $e) {
    
                //throw $th;
                return redirect()->back()->withErrors('error',$e->getMessage()); 
            }
    
        }


       //////////// Delete////////////////

    
        public function destroy($id){
            $product=Product::find($id);
            $product->delete();
            $fileName=$product->image;
                
                 if ($fileName) {
                    $filePath = public_path("assets/img/products/$fileName");
    
                    if (file_exists($filePath)) {
                        unlink($filePath);
    
                    }}
            return  redirect()->back();
        }
}
