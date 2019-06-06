<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\hotel;

class ajaxController extends Controller
{
    function getCity(Request $request)
    {
        $countryID =  request('countryID');

        $cities =  DB::table('city')->select('id','city_name')->where('country_id','=',"$countryID")->get();

        return response()->json(array('cities'=> $cities), 200);
    }
    /***********************************************************************************/

    function getHotels(Request $request)
    {
        $CityId =  request('CityId');
        $hotels = hotel::all()->where('city_id',$CityId)->values();
        return response()->json(['hotels'=>$hotels],200);
    }



    /***********************************************************************************/



}
