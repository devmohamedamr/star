@extends('back.dashboard')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="col-md-6">
                <h1>Hotels</h1>
            </div>

            <div class="col-md-offset-3">
                <a class="btn btn-success" href="{{route('hotels.create')}}">
                    <span>Add Hotel</span>
                </a>
            </div>
        </div>

        <div class="col-md-12">
            @csrf
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputFile">Country</label>
                    <select name="country" class="form-control" id="country">
                        <option value="">select</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputFile">City</label>
                    <select name="city" class="form-control" id="city">
                        <option value="">select</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">

<button class="btn btn-info" id="showHotels">Show Hotels</button>

            </div>
        </div>


        <div class="col-md-12">
            <table class="table table-bordered" id="hotelTable">
                <thead>
                <tr>
                    <th>Hotel Name</th>
                    <th>Hotel Description</th>
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection