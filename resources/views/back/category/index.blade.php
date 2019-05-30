@extends('back.dashboard')

@section('content')

    <h1>category</h1>
    <div class="listar-description">
    </div>
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
        @foreach($category as $cat)
        <tr>
            <td>{{$cat->title}}</td>
            <td>{{$cat->description}}</td>
            <th>
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">action
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="{{url('category/'.$cat->id.'/edit')}}">update</a></li>
                    <li><a href="{{ url('delete/'.$cat->id )}}">delete</a></li>
                </ul>
                </div>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection