@extends('back.dashboard')
@section('content')
    <form role="form" method="post" action="{{ route('hotels.store') }}" enctype="multipart/form-data">

        @csrf

    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Hotel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hotel Name</label>
                        <input type="text"  name = 'hotelName' class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hotel Description</label>
                        <textarea class="form-control" name = 'hotelDescription' rows="3" placeholder="Enter ..."></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputFile">Hotel Images</label>
                        <input  name = 'hotelImages[]' type="file" id="exampleInputFile" multiple>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Country</label>
                        <select name="country" class="form-control" id="country">
                            <option value="">select</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
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
                    {!! $map['js'] !!}
                    {!! $map['html'] !!}
                    </div>
                </div>


                <div class="col-md-12" >

                    @foreach($facilities as $facility)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="">
                                    <div class="icheckbox_minimal-red checked" aria-checked="false" aria-disabled="false">
                                        <input name="facilities[]" type="checkbox" class="minimal-red" value="{{$facility->id}}" >
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
    @if(Session::has('add'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> </h4>
            {{Session::get('add')}}
        </div>
    @endif

@endsection