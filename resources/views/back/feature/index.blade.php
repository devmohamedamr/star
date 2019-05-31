@extends('back.dashboard')

@section('content')

    <h1>features</h1>
    <div class="listar-description">
    </div>
    <li> 
    <a class="btn btn-success" href="{{route('feature.create')}}">
                            <i class="icon-plus"></i>
                            <span>Add feature</span>
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
        @foreach($features as $feature)
        <tr>
            <td>{{$feature->feature_name}}</td>
            <td>{{$feature->description}}</td>
            <th>
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">action
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="{{url('feature/'.$feature->id.'/edit')}}">update</a></li>
                    <li><a href="{{ url('delete/'.$feature->id )}}">delete</a></li>
                </ul>
                </div>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection