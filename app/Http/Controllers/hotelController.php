<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\hotel;

use App\hotels_images;

use App\hotel_facilities;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\File;

class hotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            "page_title" => "Hotels",
            "active_tab" => 'hotels',
        );

        $hotels =  DB::table('hotels')->get();

        $ViewArray = ['hotels'=>$hotels,'data'=>$data];

        return view('back.hotels.index',$ViewArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities =  DB::table('feature')->get();
        $Countries =  DB::table('country')->get();
        $ViewArray = ['countries'=>$Countries,'facilities'=>$facilities];

        return view('back.hotels.create',$ViewArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'hotelName' => 'required',
            'hotelDescription' => 'required',
            'country' => 'required',
            'city' => 'required',
            'facilities' => 'required',
            'hotelImages' => 'required'
        ]);


        $hotels = new hotel();

        $hotels->hotel_name = request('hotelName');
        $hotels->hotel_description = request('hotelDescription');
        $hotels->country_id = request('country');
        $hotels->city_id = request('city');
        $hotels->long = request('long');
        $hotels->lat = request('lat');
        $hotels->language_id = '1';
        $hotels->save();


        foreach (request('hotelImages') as $image)
        {
            $hotelsImages = new hotels_images();
            $input['imagename'] = md5(date('U').rand(1000,100000)).'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('img/hotels');
            $image->move($destinationPath, $input['imagename']);

            $hotelsImages->hotel_id = $hotels->id;
            $hotelsImages->image_path = $input['imagename'];
            $hotelsImages->save();

        }

        foreach (request('facilities') as $facility)
        {
            $hotelFacilities = new hotel_facilities();

            $hotelFacilities->hotel_id = $hotels->id;
            $hotelFacilities->facility_id = $facility;

            $hotelFacilities->save();
        }

        session()->flash('add','add success');

        return redirect('hotels/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $HotelInfo = hotel::where('id',$id)->first();

        $HotelImages = hotels_images::all()->where('hotel_id',$id);

        $HotelFacilities = hotel_facilities::all()->where('hotel_id',$id);

        $facilities =  DB::table('feature')->get();

        $Countries =  DB::table('country')->get();


        $ViewArray = [
            'countries'=>$Countries,
            'facilities'=>$facilities,
            'hotelInfo'=>$HotelInfo,
            'hotelImages'=>$HotelImages,
            'hotelFacilities'=>$HotelFacilities
        ];

        return view('back.hotels.edit',$ViewArray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'hotelName' => 'required',
            'hotelDescription' => 'required',
            'country' => 'required',
            'city' => 'required',
            'facilities' => 'required'
        ]);

        $hotelInfo = hotel::find($id);

        $hotel_facilities = hotel_facilities::where('hotel_id',$id)->delete();

        $hotelInfo->hotel_name = request('hotelName');
        $hotelInfo->hotel_description = request('hotelDescription');
        $hotelInfo->country_id = request('country');
        $hotelInfo->city_id = request('city');
        $hotelInfo->long = request('long');
        $hotelInfo->lat = request('lat');
        $hotelInfo->save();

        if(request('hotelImages'))
        {
            $hotelsImages = hotels_images::all()->where('hotel_id',$id);

            foreach ($hotelsImages as $hotelsImage)
            {
                $imagePath = "img/hotels/".$hotelsImage->image_path;
                @unlink($imagePath);
            }

            hotels_images::where('hotel_id',$id)->delete();

            foreach (request('hotelImages') as $image)
            {
                $hotelsImages = new hotels_images();
                $input['imagename'] = md5(date('U').rand(1000,100000)).'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('img/hotels');
                $image->move($destinationPath, $input['imagename']);

                $hotelsImages->hotel_id = $id;
                $hotelsImages->image_path = $input['imagename'];
                $hotelsImages->save();

            }
        }

        foreach (request('facilities') as $facility)
        {
            $hotelFacilities = new hotel_facilities();

            $hotelFacilities->hotel_id = $id;
            $hotelFacilities->facility_id = $facility;

            $hotelFacilities->save();
        }


        session()->flash('add','updated success');

        return redirect("hotels/$id/edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
