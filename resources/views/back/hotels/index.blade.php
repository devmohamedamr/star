@extends('back.dashboard')

@section('content')

    <h1>Hotels</h1>
    <div class="listar-description">
    </div>
    <li> 
    <a class="btn btn-success" href="{{route('hotels.create')}}">
                            <i class="icon-plus"></i>
                            <span>Add Hotel</span>
                        </a>
	</li>
<br>
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Hotel Name</th>
            <th>Description</th>
            <th>control</th>
        </tr>
    </thead>
    <tbody>

        @foreach($hotels as $hotel)
        <tr>
            <td>{{$hotel->hotel_name}}</td>
            <td>{{$hotel->hotel_description}}</td>
            <th>
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">action
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="{{url('hotels/'.$hotel->id.'/edit')}}">update</a></li>
                    <li><a href="{{ url('delete/'.$hotel->id )}}">delete</a></li>
                </ul>
                </div>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection