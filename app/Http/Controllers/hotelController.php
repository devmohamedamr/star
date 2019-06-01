<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use FarhanWazir\GoogleMaps\GMaps;

use App\hotel;

use App\hotels_images;

use App\hotel_facilities;

class hotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $config = array();
        $config['zoom'] = '9';
        $config['geoCodeCaching'] = true;

        $config['map_height'] = "30%";

        $config['center'] = "30.044281,31.340002";


        $Gmaps = new GMaps();

        $Gmaps->initialize($config);


        $map = $Gmaps->create_map();

        $Countries =  DB::table('country')->get();

        $ViewArray = ['countries'=>$Countries,'facilities'=>$facilities,'map'=>$map];

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
        $hotels->city_id = request('city');
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
        //
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
        //
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
