@extends('admin.master');
@section('content')
<!DOCTYPE html>

<div class="row">
  <div class="col-md-12"> 
      
      <h3 class="text-center text-success">{{Session::get('message')}}</h3>
      <hr/>
      <h2>Category Info</h2>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Description</th>
            <th>Publication Status</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td scope="row">{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->publicationStatus== 1 ? 'published' : 'unpublished'}}</td>
            <td>
                <a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
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