<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;


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
        
        $uploadPath='Images/';
        $productImage->move($uploadPath,$name);
        $imageUrl=$uploadPath.$name;
        $this->saveProductInfo($request,$imageUrl);
        return redirect('product/add')->with('message','Product save successfully');
        
    }
        
    protected function saveProductInfo($request,$imageUrl)
    {
        $product=new Product();
        $product->productName=$request->productName;
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
        
    public function manageProduct()
    {
        $products=DB::table('products')
            ->join('categories','products.categoryId','=','categories.id')
            ->join('manufacturers','products.manufacturerId','=','manufacturers.id')
            ->select('products.id','productName','products.productPrice','products.productQuantity','products.publicationStatus','categories.categoryName','manufacturers.manufacturerName')
            ->get();
        return view('admin.product.manageProduct',compact('products'));
    }
    
    public function viewProduct($id)
    {
        $productById=DB::table('products')
            ->join('categories','products.categoryId','=','categories.id')
            ->join('manufacturers','products.manufacturerId','=','manufacturers.id')
            ->select('products.*','categories.categoryName','manufacturers.manufacturerName')
            ->where('products.id','=',$id)
            ->first();
        return view('admin.product.viewProduct',compact('productById'));
        
    }
        
   public function editProduct($id)
   {
        $categories=Category::where('publicationStatus',1)->get();
        $manufacturers=Manufacturer::where('publicationStatus',1)->get();
        $productById=Product::where('id',$id)->first();
        return view('admin.product.editProduct',compact('productById','categories','manufacturers'));
   }
   public function updateProduct(Request $request)
   {    
       $imageUrl=$this->imageExistStatus($request);
       
       
       return redirect('product/manage')->with('message','Product update successfully');
       
   }
   protected function imageExistStatus($request)
   {
       
       $productById=Product::where('id',$request->productId)->first();
       
       $productImage=$request->file('productImage');
       if($productImage)
       {
            unlink($productById->productImage);
            $name=$productImage->getClientOriginalName();
            $uploadPath='Images/';
            $productImage->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name; 
       }
       else
       {
            $imageUrl=$productById->productImage;

       }
       return $imageUrl; 
        $productById->productName=$request->productName;
        $productById->categoryId=$request->categoryId;
        $productById->manufacturerId=$request->manufacturerId;
        $productById->productPrice=$request->productPrice;
        $productById->productQuantity=$request->productQuantity;
        $productById->productShortDescription=$request->productShortDescription;
        $productById->productLongDescription=$request->productLongDescription;
        $productById->productImage=$imageUrl;
        $productById->publicationStatus=$request->publicationStatus;
        $productById->save();
       
       
       
   }
    

   public function deleteProduct($id)
   {
       $product=Product::findOrFail($id)->first();
       
        unlink($product->productImage);
        $product->delete();
       
       return redirect('/product/manage')->with('message','Product delete successfully');
   }
   
   
//    public function updateProduct(Request $request)
//   {    
//       $imageUrl=$this->imageExistStatus($request);
//       $this->updateProductInfo($request,$imageUrl);
//       
//       return redirect('product/manage')->with('message','Product update successfully');
//       
//   }
//   private function imageExistStatus($request)
//   {
//       $productById=Product::where('id',$request->productId)->first();
//       $productImage=$request->file('productImage');
//       if($productImage)
//       {
//            unlink($productById->productImage);
//            $name=$productImage->getClientOriginalName();
//            $uploadPath='public/Images/';
//            $productImage->move($uploadPath,$name);
//            $imageUrl=$uploadPath.$name; 
//       }
//       else
//       {
//            $imageUrl=$productById->productImage;
//
//       }
//       return $imageUrl; 
//   }
//
//   
//   
//   protected function updateProductInfo($request,$imageUrl)
//    {
//        
//        $productById->productName=$request->productName;
//        $productById->categoryId=$request->categoryId;
//        $productById->manufacturerId=$request->manufacturerId;
//        $productById->productPrice=$request->productPrice;
//        $productById->productQuantity=$request->productQuantity;
//        $productById->productShortDescription=$request->productShortDescription;
//        $productById->productLongDescription=$request->productLongDescription;
//        $productById->productImage=$imageUrl;
//        $productById->publicationStatus=$request->publicationStatus;
//        $productById->save();
//    }
}
