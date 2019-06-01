<?php

namespace App\Http\Controllers;

use App\language;
use Illuminate\Http\Request;
use App\country;
use Illuminate\Support\Facades\DB;


class countryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = country::all();
        //      dd($countries);
        return view('Back.country.index',['countries'=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $language =  language::all();
        return view('back.country.create',['language'=>$language]);
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

        foreach($request['title'] as $k => $v){
            $data[$k]['name'] = $request->input("title.$k");
        }
        foreach($request['description'] as $k => $v){
            $data[$k]['desc'] = $request->input("description.$k");
        }
        foreach($request['title'] as $k => $v){
            $data[$k]['lang'] = $k;
        }

        $image =  $request->file('files');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img');
        $new =  $image->move($destinationPath, $input['imagename']);


        foreach($data as $d){
            $all[] =  array(
                'title' => $d['name'],
                'description' => $d['desc'],
                'language_code' => $d['lang'],
                'image' =>  $input['imagename']
            );
        } 
            DB::table('country')->insert($all);

            \Session::flash('add','add success');
            return redirect('country');
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
        country::destroy($id);
        return redirect('/country');
    }
}
