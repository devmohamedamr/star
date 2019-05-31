@extends('back.dashboard')
@section('content')

@if(Session::has('add'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> </h4>
            {{Session::get('add')}}
        </div>
@endif

<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">description</label>
    <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
<div class="form-group">
    <label for="exampleFormControlInput1">img</label>
      <input type="file" name="files" id="js-upload-files">
</div>
    
  <input type="submit" name="add" value="add"  />


</form>
@endsection