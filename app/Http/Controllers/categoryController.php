<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\category;

class categoryController extends Controller
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
            "page_title" => "category",
            "active_tab" => 'category',
        );

        $category = category::all();
        return view('back.category.index',['category' => $category]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.category.create');

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
            'title' => 'required',
            'description' => 'required',
            'files' => 'required',
        ]);

        $image =  $request->file('files');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img');
        $new =  $image->move($destinationPath, $input['imagename']);

        $title = $request->input('title');
        $description = $request->input('description');
        $category = new category();
        $category->title = $title;
        $category->description = $description;
        $category->image = $input['imagename'];
        $category->save();
        \Session::flash('add','add success');
        return redirect('category/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
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
        $category = category::find($id);

        return view('back.category.edit',['category'=>$category]);

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

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',           
        ]);
      $category =  category::find($id);
      $category->title = $request->input('title');
      $category->description = $request->input('description');

      $category->save();
      \Session::flash('update','updated success');
      return redirect('category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        category::destroy($id);
        return redirect('/category');
    
        //
    }
}
