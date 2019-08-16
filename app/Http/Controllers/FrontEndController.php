<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Place;
use App\Condition;
use App\Item;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ItemsExport;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('welcome')->with('categories',Category::all())
                           ->with('places',Place::all())
                           ->with('conditions',Condition::all());
    }
    public function item()
    {   
        
        return view('allitems')->with('items',Item::all());
    }
    public function category()
    {
        return view('categories')->with('categories',Category::all())
                                 ->with('conditions',Condition::all());
    }
    public function condition()
    {
        return view('conditions')->with('conditions',Condition::all());
    }
    public function place()
    {
        return view('places')->with('places',Place::all())
                                 ->with('conditions',Condition::all());
    }
    public function cate_items($id)
    {
        return view('category_items')->with('category',Category::find($id));
                                 
    }
    public function place_items($id)
    {
        return view('place_items')->with('place',Place::find($id));
    }
    public function condition_items($id)
    {  
        return view('condition_items')->with('condition',Condition::find($id));
    }


    public function excel(){
        return Excel::download(new ItemsExport, 'items.xlsx');
    }

}