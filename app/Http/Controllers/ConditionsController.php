<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condition;
use Session;
class ConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.conditions.index')->with('conditions',Condition::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conditions.create');

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
            'condition'=>'required'
        ]);
        $condition=Condition::create([
            'condition' =>  $request->condition
        ]);
        Session::flash('success','Condition Added Successfully'); 
        return redirect()->back();
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
        return view('admin.conditions.edit')->with('condition',Condition::find($id));
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
            'condition' =>  'required',
        ]);
        $condition=Condition::find($id);
        $condition->condition=$request->condition;
        $condition->save();

        Session::flash('success','Condtion Updated Successfully');
        return redirect()->route('admin.conditions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $condition=Condition::find($id);
        $condition->Delete();       
        Session::flash('success','Conditions Deleted Successfully');
        return redirect()->route('admin.conditions');
    }
}
