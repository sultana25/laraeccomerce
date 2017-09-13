@extends('admin.master');
@section('content')
<!DOCTYPE html>

<div class="row">
  <div class="col-md-12"> 
      
      <h3 class="text-center text-success">{{Session::get('message')}}</h3>
      <hr/>
      <h2>User Info</h2>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Addess</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach($users as $user)
          
          <tr>
            <td scope="row">{{$i++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>
                <a href="{{url('/user/edit/'.$user->id)}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/user/delete/'.$user->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    
    </div>
</div>

<hr/>
<div>
    {{$users->links()}}
</div>
@endsection