@extends('back.dashboard')
@section('content')

    @if(Session::has('add'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> </h4>
            {{Session::get('add')}}
        </div>
    @endif

<form action="{{route('city.store')}}" method="POST" enctype="multipart/form-data">
  @csrf

{{-- <ul class="nav nav-tabs">
  @foreach ($language as $index => $l)
        <li class="{{ $index ==  0 ? 'active' : ''  }}"><a data-toggle="tab" href="#{{$l->name}}">{{$l->name}}</a></li>
  @endforeach
</ul> --}}

<div class="tab-content">
    {{-- @foreach ($language as $index => $l) --}}

  {{-- <div id="{{$l->name}}" class="tab-pane fade {{ $index ==  0 ? 'in active' : ''  }}"> --}}
      <div class="form-group">
    <label for="title[]">Country Name</label><span style="color: red !important; display: inline; float: none;"> 
        <input name="title[]" type="text"  />
  </div>
  <div class="form-group">
    <label for="description">Country Description</label>
	<textarea id="description[]" name="description[]" class="md-textarea form-control" rows="3"></textarea>
  </div>
  </div>

    {{-- @endforeach --}}
</div>
  
<div class="form-group">
    <label for="Country Image">Country Image</label>
      <input type="file" name="files" multiple id="img">
</div>
    
  <input type="submit" name="add" value="add"  />


</form>
@endsection