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
        $features = DB::table('feature')->where("language_code","english")->get();
        return view('back.feature.index',['features' => $features]);
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
         //dd($request);
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
        $maxfid = DB::table('feature')->max("f_id");
        //dd($maxfid);
        foreach($data as $d){
            $all[] =  array(
                'feature_name' => $d['name'],
                'description' => $d['desc'],
                'language_code' => $d['lang'],
                'category_id' => $category_id,
                'f_id' => $maxfid++

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
        $feature = feature::find($id);

        return view('back.feature.edit',['feature'=>$feature]);

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
    //     $this->validate($request,[
    //         'title' => 'required',
    //         'description' => 'required',           
    //     ]);
    //   $category =  category::find($id);
    //   $category->title = $request->input('title');
    //   $category->description = $request->input('description');

    //   $category->save();
    //   \Session::flash('update','updated success');
    //   return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        feature::destroy($id);
        return redirect('/feature');

    }
}
