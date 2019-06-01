@extends('back.dashboard')
@section('content')

<form action="{{action('userController@update', $user->id)}}" method="POST" enctype="multipart/form-data">
  @csrf

<div class="tab-content">

    <div class="form-group">
        <label for="name">Name</label><span style="!important; display: inline; float: none;"> 
        <input name="name" type="text" @error('name') is-invalid @enderror"  value="{{$user->name}}" required autocomplete="name" autofocus  />

    </div>

    <div class="form-group">
        <label for="email">email</label><span style="!important; display: inline; float: none;"> 
        <input name="email" type="email"  @error('email') is-invalid @enderror"  value="{{ $user->email}}" required autocomplete="email" autofocus />
    </div>

    <div class="form-group">
        <label for="password"> new password</label><span style=" !important; display: inline; float: none;"> 
        <input name="password" type="password"  />
    </div>

    <div class="form-group">
        <label for="password">confirm new password</label><span style=" !important; display: inline; float: none;"> 
        <input name="password_confirmation" type="password"  />
    </div>

    <div class="form-group">
        <label for="privilege">privilege</label><span style=" !important; display: inline; float: none;"> 
          <select name="privilege">
            <option @if($user->privilege == 'SuperAdmin') selected @endif  value="SuperAdmin">SuperAdmin</option>
            <option @if($user->privilege == 'Admin') selected @endif  value="Admin">Admin</option>
            <option @if($user->privilege == 'Client') selected @endif  value="Client">Client</option>
          </select>
    </div>

      {{ method_field('PUT') }} 

  <input type="submit" name="add" value="update "  />

</div>
</form>


@endsection