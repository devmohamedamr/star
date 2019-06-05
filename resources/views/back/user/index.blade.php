@extends('back.dashboard')

@section('content')

    @if(Session::has('add'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> </h4>
            {{Session::get('add')}}
        </div>
    @endif

    @if(Session::has('update'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> </h4>
            {{Session::get('update')}}
        </div>
    @endif

    <h1>users</h1>
    <div class="listar-description">
    </div>
    <li> 
    <a class="btn btn-success" href="{{route('user.create')}}">
                            <i class="icon-plus"></i>
                            <span>Add user</span>
                        </a>
	</li>
<br>
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>name</th>
            <th>email</th>
            <th>privilege</th>
            <th>control</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $cat)
        <tr>
            <td>{{$cat->name}}</td>
            <td>{{$cat->email}}</td>
            <td>{{$cat->privilege}}</td>

            <th>
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">action
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="{{url('user/'.$cat->id.'/edit')}}">update</a></li>
                    <li><a href="{{ url('user/delete/'.$cat->id )}}">delete</a></li>
                </ul>
                </div>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection