<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;


class ProductController extends Controller
{
    public function createProduct()
    {
        $categories=Category::where('publicationStatus',1)->get();
        $manufacturers=Manufacturer::where('publicationStatus',1)->get();
        return view('admin.product.createProduct',compact('categories','manufacturers'));
    }
    
    public function storeProduct(Request $request)
    {
        $this->validate($request,[
           'productName'=>'required',
           'productPrice'=>'required',
            'productImage'=>'required'
        ]);
        
        $productImage=$request->file('productImage');
        
        $name=$productImage->getClientOriginalName();
        
        $uploadPath='public/Images/';
        $productImage->move($uploadPath,$name);
        $imageUrl=$uploadPath.$name;
        $this->saveProductInfo($request,$imageUrl);
        return redirect('product/add')->with('message','Product save successfully');
        
    }
        
        protected function saveProductInfo($request,$imageUrl)
        {
            $product=new Product();
            $product->name=$request->productName;
            $product->categoryId=$request->categoryId;
            $product->manufacturerId=$request->manufacturerId;
            $product->productPrice=$request->productPrice;
            $product->productQuantity=$request->productQuantity;
            $product->productShortDescription=$request->productShortDescription;
            $product->productLongDescription=$request->productLongDescription;
            $product->productImage=$imageUrl;
            $product->publicationStatus=$request->publicationStatus;
            $product->save();
        }
        
        
        
    
}
