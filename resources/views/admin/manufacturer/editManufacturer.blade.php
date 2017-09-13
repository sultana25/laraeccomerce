@extends('admin.master')
@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        
        <hr/>
<div class="well">
<!--    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">-->
    {!!Form::open(['url'=>'/manufacturer/update', 'method'=>'POST', 'class'=>'form-horizontal','name'=>'editManufacturerForm'])!!}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Manufacturer Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="manufacturerName" value="{{$manufacturerById->name}}">
                <input type="hidden" class="form-control" name="manufacturerId" value="{{$manufacturerById->id}}">
                <span class="text-danger">{{$errors->has('manufacturerName')?$errors->first('manufacturerName'):''}}</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Manufacturer Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="manufacturerDescription" rows="8">{{$manufacturerById->description}}</textarea>
                <span class="text-danger">{{$errors->has('manufacturerDescription')?$errors->first('manufacturerDescription'):''}}</span>
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
                <button type="submit" name="btn" class="btn btn-success btn-block">Update Information</button>
            </div>
        </div>
    </div>
    </div>
</div>


     {!!Form::close()!!}
<script>
    
    document.forms['editManufacturerForm'].elements['publicationStatus'].value={{$manufacturerById->publicationStatus}}
</script>
@endsection