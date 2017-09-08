@extends('admin.master')
@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        
        <hr/>
<div class="well">
<!--    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">-->
    {!!Form::open(['url'=>'/category/update', 'method'=>'POST', 'class'=>'form-horizontal','name'=>'editCategoryForm'])!!}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="categoryName" value="{{$categoryById->name}}">
                <input type="hidden" class="form-control" name="categoryId" value="{{$categoryById->id}}"}}>
                <span class="text-danger">{{$errors->has('categoryName')?$errors->first('categoryName'):''}}</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Category Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="categoryDescription" rows="8">{{$categoryById->description}}</textarea>
                <span class="text-danger">{{$errors->has('categoryDescription')?$errors->first('categoryDescription'):''}}</span>
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
                <button type="submit" name="btn" class="btn btn-success btn-block">Save Cayegory Information</button>
            </div>
        </div>
    </div>
    </div>
</div>


     {!!Form::close()!!}
<script>
    document.forms['editCategoryForm'].elements['publicationStatus'].value={{$categoryById->publicationStatus}}
</script>
@endsection