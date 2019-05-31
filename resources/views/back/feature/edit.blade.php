@extends('back.dashboard')
@section('content')

    @if(Session::has('update'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> </h4>
            {{Session::get('update')}}
        </div>
    @endif

<form action="{{route('feature.store')}}" method="POST" enctype="multipart/form-data">
  @csrf

<ul class="nav nav-tabs">
  @foreach ($language as $index => $l)
        <li class="{{ $index ==  0 ? 'active' : ''  }}"><a data-toggle="tab" href="#{{$l->name}}">{{$l->name}}</a></li>
  @endforeach

</ul>

<div class="tab-content">
  <br>  
    @foreach ($language as $index => $l)

  <div id="{{$l->name}}" class="tab-pane fade {{ $index ==  0 ? 'in active' : ''  }}">
      <div class="form-group">
    <label for="featurename">feature Name</label><span style="color: red !important; display: inline; float: none;"> 
        <input name="featurename[{{$l->name}}]" type="text"  />

  </div>
  <div class="form-group">
    <label for="featuredescription">feature Description</label>
	<textarea id="featuredescription"  name="featuredescription[{{$l->name}}]" class="md-textarea form-control" rows="3"></textarea>
  </div>
  </div>

    @endforeach
</div>

    <div class="form-group">
    <label for="Country Map">feature category</label>
    <select name="featurecategory">
      @foreach ($category as $cat)
    <option value="{{ $cat->id}}">{{ $cat->title}}</option>
 
      @endforeach
    </select>
  </div>
  
    
  <input type="submit" name="add" value="add"  />


</form>


@endsection