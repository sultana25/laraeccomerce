<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function createCategory()
    {
        
            return view('admin.category.createCategory');
    }
    
    public function storeCategory(Request $request)
    {
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
        return redirect()->back();
    }
}
