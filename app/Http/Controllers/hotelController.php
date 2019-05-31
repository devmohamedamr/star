<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use FarhanWazir\GoogleMaps\GMaps;

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

        $hotels =  DB::table('hotel')->get();

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


        $marker['position'] = "30.044281,31.340002";
        $marker['infowindow_content'] = "egypt";


        $Gmaps = new GMaps();

        $Gmaps->initialize($config);
        $Gmaps->add_marker($marker);


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
        //
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
