<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create'); 
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
            'category_name' => 'required',
            'picture'=>'required|image'
        ]);
        $picture=$request->file('picture');
        $picture_new_name=time().$picture->getclientOriginalName();
        $picture->move('uploads/categories/',$picture_new_name);
        $category=Category::create([
            'category_name' =>  $request->category_name,
            'picture'       =>  '/uploads/categories/'.$picture_new_name
         ]);
        
         Session::flash('success','Category added Successfully');   
         return redirect()->route('admin.categories');
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
        return view('admin.categories.edit')->with('category',Category::find($id));
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
            'category_name'=>'required'
        ]);

        $category=Category::find($id);

        if($request->hasFile('picture')){

            $picture=$request->file('picture');
            $picture_new_name=time().$picture->getclientOriginalName();
            $picture->move('uploads/categories/',$picture_new_name);
            $category->picture='/uploads/categories/'.$picture_new_name;
            $category->save();
        }

        $category->category_name=$request->category_name;
        $category->save();

        Session::flash('success','Category Updated Successfully');
        return redirect()->route('admin.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);

        foreach($category->items as $item)
        {
            $item->forceDelete();
        }
        $category->Delete();

        Session::flash('success','Category Deleted Successfully');
        return redirect()->route('admin.categories');
    }
}
