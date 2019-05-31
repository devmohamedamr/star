@extends('back.dashboard')

@section('content')

    <h1>country</h1>
    <div class="listar-description">
    </div>
    <li> 
    <a class="btn btn-success" href="{{route('country.create')}}">
                            <i class="icon-plus"></i>
                            <span>Add country</span>
                        </a>
	</li>
<br>
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>title</th>
            <th>description</th>
            <th>control</th>
        </tr>
    </thead>
    <tbody>
        @foreach($countries as $cat)
        <tr>
            <td>{{$cat->title}}</td>
            <td>{{$cat->description}}</td>
            <th>
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">action
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="{{url('country/'.$cat->id.'/edit')}}">update</a></li>
                    <li><a href="{{ url('country/delete/'.$cat->id )}}">delete</a></li>
                </ul>
                </div>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection