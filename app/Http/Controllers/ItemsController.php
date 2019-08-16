<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Place;
use App\Condition;
use App\Item;
use Session;
use Excel;
use DNS2D;
use Illuminate\Support\Facades\Storage;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.items.index')->with('items',Item::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();
        $places=Place::all();
        $conditions=Condition::all();
        if($categories->count()==0 || $places->count()==0 || $conditions->count()==0)
        {
            Session::flash('info','you Have to add minimum One category and place and condition');
            return redirect()->back();
        }
        else
        {
            return view('admin.items.create')->with('categories',$categories)
                                         ->with('places',$places)
                                         ->with('conditions',$conditions);
        }
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
            'name'      =>  'required',
            'image'     =>  'required',
            'category_id'=> 'required',
            'place_id'  =>  'required',
            'condition_id' =>'required',
            'bought_at' =>  'required',
            'cost'      =>  'required',
            'description'=>  'required'    

        ]);
        $image=$request->file('image');
        $image_new_name=time().$image->getclientOriginalName();
        $image->move('uploads/items/',$image_new_name);
        $item_id="011{$request->place_id}15{$request->category_id}2019{$request->name}";
        $item=Item::create([
            'name'        =>  $request->name,
            'slug'        =>  str_slug($request->name),        
            'image'       =>  '/uploads/items/'.$image_new_name,
            'item_id'     =>    $item_id,
            'category_id' =>   $request->category_id,
            'place_id'    =>    $request->place_id,
            'bought_at'   =>    $request->bought_at,
            'cost'        =>    $request->cost,
            'description' =>    $request->description      
         ]);
         $item->conditions()->attach($request->condition_id);
         Session::flash('success','Item Added Successfully');   
         return redirect()->route('admin.items');
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
        return view('admin.items.edit')->with('item',Item::find($id))
                                       ->with('categories',Category::all())
                                       ->with('places',Place::all())
                                       ->with('conditions',Condition::all());
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
            'name'      =>  'required',
            'category_id'=> 'required',
            'place_id'  =>  'required',
            'conditions' =>'required',
            'bought_at' =>  'required',
            'cost'      =>  'required',
            'description'=>  'required'
        ]);

        $item=Item::find($id);

        if($request->hasFile('image')){

            $picture=$request->file('image');
            $picture_new_name=$request->name;
            $picture->move('uploads/items/',$picture_new_name);
            $item->image='/uploads/items/'.$picture_new_name;
            $item->save();
        }

        $item->name=$request->name;
        $item->slug=str_slug($request->name);
        $item->place_id=$request->place_id;
        $item->category_id=$request->category_id;
        $item->bought_at=$request->bought_at;
        $item->cost=$request->cost;
        $item->description=$request->description;
        $item->save();
        $item->conditions()->sync($request->conditions);

        Session::flash('success','Item Details Updated Successfully');
        return redirect()->route('admin.items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);
        Session::flash('success','Item deleted Successfully');
        return redirect()->route('admin.items');
    }
    
    
}
