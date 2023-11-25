<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
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
        return redirect('admin/category/index');

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
         
             $fileName=$category->image;
            
             if ($fileName) {
                $filePath = public_path("assets/img/category/$fileName");

                if (file_exists($filePath)) {
                    unlink($filePath);

                }}

                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('assets/img/category', $filename);
                    $category->name = $request->name;
                    $category->description = $request->description;
                    $category->image = $filename;
                    $category->save();
           
        return redirect()->url('admin/category/index');
           
            //code...
        } catch (\Exception $e) {

            //throw $th;
            return redirect()->back()->withErrors('error',$e->getMessage()); 
        }

    }

    public function destroy($id){
        $category=Category::find($id);
        $category->delete();
        $fileName=$category->image;
            
             if ($fileName) {
                $filePath = public_path("assets/img/category/$fileName");

                if (file_exists($filePath)) {
                    unlink($filePath);

                }}
        return redirect('admin/category/index');

    }



}