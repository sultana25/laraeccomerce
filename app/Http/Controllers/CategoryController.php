<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Session;

class CategoryController extends Controller
{
    public function createCategory()
    {
        
            return view('admin.category.createCategory');
    }
    
    public function storeCategory(Request $request)
    {
        $this->validate($request,[
            'categoryName'=>'required',
            'categoryDescription'=>'required'
        ]);
//        $category=new Category();
//        $category->name=$request->categoryName;
//        $category->description=$request->categoryDescription;
//        $category->publicationStatus=$request->publicationStatus;
//        $category->save();
//        return "category save successfully";
//        Category::create($request->all());
//        return "category save successfully";
        
        DB::table('categories')->insert([
            'name'=>$request->categoryName,
            'description'=>$request->categoryName,
            'publicationStatus'=>$request->publicationStatus,
            
        ]);
        return redirect()->back()->with('message','Category info save successfully');
    }
    
    public function manageCategory()
    {
        $categories=Category::all();
        return view('admin.category.manageCategory',compact('categories'));
    }
    
    
    public function editCategory($id)
    {
       
        $categoryById=Category::where('id',$id)->first();
        return view('admin.category.editCategory',compact('categoryById'));
    }
    
    public function updateCategory(Request $request)
    {
         $this->validate($request,[
            'categoryName'=>'required',
            'categoryDescription'=>'required'
        ]);
        $category=Category::find($request->categoryId);
        $category->name=$request->categoryName;
        $category->description=$request->categoryDescription;
        $category->publicationStatus=$request->publicationStatus;
        $category->save();
        return redirect('category/manage')->with('message','Category info update successfully');
    }
    
    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect('/category/manage')->with('message','Category delete successfully')->with('message','Category delete successfully');
        
    }
}
