<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feature;
use App\language;
use App\category;

use Illuminate\Support\Facades\DB;

class featureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('back.feature.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language =  DB::table('language')->get();
        $category =  DB::table('categories')->get();

        return view('back.feature.create',['language'=>$language,'category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        foreach($request['featurename'] as $k => $v){
            $data[$k]['name'] = $request->input("featurename.$k");
        }
        foreach($request['featuredescription'] as $k => $v){
            $data[$k]['desc'] = $request->input("featuredescription.$k");
        }
        foreach($request['featurename'] as $k => $v){
            $data[$k]['lang'] = $k;
        }
        
        $category_id = $request->input('featurecategory');
        
        $feature = new feature();
  
        foreach($data as $d){
            $all[] =  array(
                'feature_name' => $d['name'],
                'description' => $d['desc'],
                'language_id' => $d['lang'],
                'category_id' => $category_id
            );
        } 
            DB::table('feature')->insert($all);

            \Session::flash('add','add success');
            return redirect('feature');

        
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
