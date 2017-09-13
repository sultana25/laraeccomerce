@extends('admin.master')
@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
    <hr/>
<div class="well">
<!--    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">-->
    {!!Form::open(['url'=>'/product/update', 'method'=>'POST', 'class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editProductForm'])!!}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="productName" value="{{$productById->productName}}">
                <input type="hidden" class="form-control" name="productId" value="{{$productById->id}}">
                <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
                <select class="form-control" name="categoryId">
                    <option>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Manufacturer</label>
            <div class="col-sm-10">
                <select class="form-control" name="manufacturerId">
                    <option>Select Manufacturer</option>
                    @foreach($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="productPrice" value="{{$productById->productPrice}}">
                <span class="text-danger">{{$errors->has('productPrice')?$errors->first('productPrice'):''}}</span>
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="productQuantity" value="{{$productById->productQuantity}}">
                <span class="text-danger">{{$errors->has('productQuantity')?$errors->first('productQuantity'):''}}</span>
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Product Short Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="productShortDescription" rows="4">{{$productById->productShortDescription}}</textarea>
                <span class="text-danger">{{$errors->has('productShortDescription')?$errors->first('productShortDescription'):''}}</span>
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">product Long Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="productLongDescription" rows="8">{{$productById->productLongDescription}}</textarea>
                <span class="text-danger">{{$errors->has('productLongDescription')?$errors->first('productLongDescription'):''}}</span>
            </div>
        </div>
        
        
    
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>
            <div class="col-sm-10">
                <input type="file" name="productImage" accept="image/*" >
                <img src="{{asset($productById->productImage)}}" alt="" width="150" height="150">
                <span class="text-danger">{{$errors->has('productImage')?$errors->first('productImage'):''}}</span>
            </div>
        </div>
    
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Publication Status</label>
            <div class="col-sm-10">
                <select class="form-control" name="publicationStatus">
                    <option>Select Publication Status</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option> 
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="btn" class="btn btn-success btn-block">Save Manufacturer Information</button>
            </div>
        </div>
    </div>
    </div>
</div>


     {!!Form::close()!!}
<script>
    
    document.forms['editProductForm'].elements['categoryId'].value={{$productById->categoryId}}
    document.forms['editProductForm'].elements['manufacturerId'].value={{$productById->manufacturerId}}
    document.forms['editProductForm'].elements['publicationStatus'].value={{$productById->publicationStatus}}
</script>
@endsection