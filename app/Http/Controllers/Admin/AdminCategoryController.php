<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;

class AdminCategoryController extends Controller
{
    //
    public function index()
    {
        //
        $categories=Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }


    public function create()
    {
        //
        return view('admin.category.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        //
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('assets/img/category', $filename);
            $category=new Category();
            $category->name=$request->name;
            $category->description=$request->description;
            $category->image=$filename;
            $category->save();
        }
}


         public function edit($id)
                {
                    //
                    $category_id=$id;
                    $category=Category::findOrFail($category_id);
                    return view('admin.category.edit',['category'=>$category]);
                }

         public function update(storeCategoryRequest $request,$id)
    {
        //
        $category=Category::find($id);
        try {

          // $vaildated=$request->vaildated(); ?????????????
         
             $image=$category->image;
             
        if($request->hasFile('image')){
            Storage::disk('public/assets/img/category')->delete($image);
            $image=$request->file('image')->store('assets/img/category');
 
        }
           $category->update([
            'name'=>$request->name,
            'description'=>$request->description ,
            'image'=>$image,
            

           ]);
           
  return redirect()->url('admin/category/index');
           
            //code...
        } catch (\Exception $e) {

            //throw $th;
            return redirect()->back()->withErrors('error',$e->getMessage()); 
        }

    }

}