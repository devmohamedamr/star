@extends('back.dashboard')
@section('content')
    <form role="form" method="post" action="{{ route('hotels.update',$hotelInfo->id) }}" enctype="multipart/form-data">

        <input type="hidden" name="_method" value="PUT">
        @csrf

        @if(session()->has('add'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> </h4>
                {{session()->get('add')}}
            </div>
        @endif

        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Hotel</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hotel Name</label>
                        <input type="text"  name = 'hotelName' class="form-control"  value="{{$hotelInfo->hotel_name}}" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hotel Description</label>
                        <textarea class="form-control" name = 'hotelDescription' rows="3" placeholder="Enter ...">{{$hotelInfo->hotel_description}}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputFile">Hotel Images</label>
                        <input  name = 'hotelImages[]' type="file" id="exampleInputFile" multiple>

                        <div class="col-md-12">
                            @foreach($hotelImages as $image)
                                <div class="col-md-3"><img src="{!! asset("img/hotels/$image->image_path") !!}"></div>
                            @endforeach

                       </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Country</label>
                        <select name="country" class="form-control" id="country">

                            @foreach($countries as $country)
                                @php($selected = '')
                                @if($country->id == $hotelInfo->country_id)
                                    @php($selected = 'selected')

                                @endif
                                <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="currentCityID" id = "currentCityID" value="{{$hotelInfo->city_id}}">
                        <label for="exampleInputFile">City</label>
                        <select name="city" class="form-control" id="city">
                            <option value="">select</option>
                        </select>
                    </div>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>    <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <input type="hidden" name="long" id="long" value="">
                            <input type="hidden" name="lat" id="lat" value="">
                            <div id="map" style="height: 50%"></div>
                        </div>
                    </div>


                    <div class="col-md-12" >

                        @foreach($facilities as $facility)
                            @php($checked = '')
                            @foreach($hotelFacilities as $hotelFacility)

                                @if($hotelFacility->facility_id ==$facility->id)
                                    @php($checked = 'checked')

                                @endif

                            @endforeach

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="">
                                        <div class="icheckbox_minimal-red checked" aria-checked="false" aria-disabled="false">
                                            <input name="facilities[]" type="checkbox" class="minimal-red" value="{{$facility->id}}"  {{ $checked }}>
                                        </div>
                                        {{$facility->feature_name}}
                                    </label>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </form>


@endsection