@extends('admin.master');
@section('content')
<!DOCTYPE html>

<div class="row">
  <div class="col-md-12"> 
      
      <hr/>
      <h2>Product Info</h2>

      <table class="table table-bordered table-hover">
        <tr>
            <th>product Id</th>
            <th>{{$productById->id}}</th>
        </tr>
        <tr>
            <th>product Name</th>
            <th>{{$productById->productName}}</th>
        </tr>
        <tr>
            <th>Category Name</th>
            <th>{{$productById->categoryName}}</th>
        </tr>
        <tr>
            <th>Manufacturer Name</th>
            <th>{{$productById->manufacturerName}}</th>
        </tr>
        <tr>
            <th>product Price</th>
            <th>{{$productById->productPrice}}</th>
        </tr>
        <tr>
            <th>product Quantity</th>
            <th>{{$productById->productQuantity}}</th>
        </tr>
        <tr>
            <th>product Short Description</th>
            <th>{{$productById->productShortDescription}}</th>
        </tr>
        <tr>
            <th>product Long Description</th>
            <th>{{$productById->productLongDescription}}</th>
        </tr>
          
        <tr>
            <th>product Image</th>
            <th><img src="{{asset($productById->productImage)}}" alt="{{$productById->productName}}" height="200" width="200"></th>
        </tr>
        <tr>
            <th>Publication Status</th>
            <th>{{$productById->publicationStatus}}</th>
        </tr>
        
      </table>
    
    </div>
</div>


@endsection