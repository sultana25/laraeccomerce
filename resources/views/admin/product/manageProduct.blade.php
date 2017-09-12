@extends('admin.master');
@section('content')
<!DOCTYPE html>

<div class="row">
  <div class="col-md-12"> 
      
      <h3 class="text-center text-success">{{Session::get('message')}}</h3>
      <hr/>
      <h2>Product Info</h2>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Manufacturer Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Publication Status</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            
            <td scope="row">{{$product->productName}}</td>
            <td>{{$product->categoryName}}</td>
            <td>{{$product->manufacturerName}}</td>
            <td>{{$product->productPrice}}</td>
            <td>{{$product->productQuantity}}</td>
            <td>{{$product->publicationStatus== 1 ? 'published' : 'unpublished'}}</td>
            <td>
                <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    
    </div>
</div>


@endsection