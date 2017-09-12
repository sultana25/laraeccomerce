@extends('admin.master');
@section('content')
<!DOCTYPE html>

<div class="row">
  <div class="col-md-12"> 
      
      <h3 class="text-center text-success">{{Session::get('message')}}</h3>
      <hr/>
      <h2>Manufacturer Info</h2>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Manufacturer</th>
            <th>Description</th>
            <th>Publication Status</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($manufacturers as $manufacturer)
          <tr>
            <td scope="row">{{$manufacturer->id}}</td>
            <td>{{$manufacturer->manufacturerName}}</td>
            <td>{{$manufacturer->description}}</td>
            <td>{{$manufacturer->publicationStatus== 1 ? 'published' : 'unpublished'}}</td>
            <td>
                <a href="{{url('/manufacturer/edit/'.$manufacturer->id)}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/manufacturer/delete/'.$manufacturer->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
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