@extends('back.dashboard')
@section('content')

<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
  @csrf

<div class="tab-content">

    <div class="form-group">
        <label for="name">Name</label><span style="!important; display: inline; float: none;"> 
        <input name="name" type="text" @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus  />

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="form-group">
        <label for="email">email</label><span style="!important; display: inline; float: none;"> 
        <input name="email" type="email"  @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus />
    </div>

    <div class="form-group">
        <label for="password">password</label><span style=" !important; display: inline; float: none;"> 
        <input name="password" type="password"  />
    </div>

    <div class="form-group">
        <label for="password">confirm password</label><span style=" !important; display: inline; float: none;"> 
        <input name="password_confirmation" type="password"  />
    </div>

    <div class="form-group">
        <label for="privilege">privilege</label><span style=" !important; display: inline; float: none;"> 
          <select name="privilege">
            <option value="SuperAdmin">SuperAdmin</option>
            <option value="Admin">Admin</option>
            <option value="Client">Client</option>
          </select>
    </div>

    
  <input type="submit" name="add" value="add"  />

</div>
</form>


@endsection