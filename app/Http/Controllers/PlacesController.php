<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\place;
use Session;
class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.places.index')->with('places',Place::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.places.create');
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
            'place_name'=>'required',
            'picture'   =>'required|image'
        ]);
        $picture=$request->file('picture');
        $picture_new_name=time().$picture->getclientOriginalName();
        $picture->move('uploads/places/',$picture_new_name);
        $place=Place::create([
            'place_name' =>  $request->place_name,
            'picture'       =>  '/uploads/places/'.$picture_new_name
         ]);
        
         Session::flash('success','place added Successfully');   
         return redirect()->route('admin.places');
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
        return view('admin.places.edit')->with('place',Place::find($id));
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
            'place_name'=>'required'
        ]);

        $place=Place::find($id);

        if($request->hasFile('picture')){

            $picture=$request->file('picture');
            $picture_new_name=time().$picture->getclientOriginalName();
            $picture->move('uploads/places/',$picture_new_name);
            $place->picture='/uploads/places/'.$picture_new_name;
            $place->save();
        }

        $place->place_name=$request->place_name;
        $place->save();

        Session::flash('success','place Updated Successfully');
        return redirect()->route('admin.places');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place=Place::find($id);
        foreach($place->items as $item)
        {
            $item->forceDelete();
        }
        $place->Delete();

        Session::flash('success','Place Deleted Successfully');
        return redirect()->route('admin.places');
    }
}
