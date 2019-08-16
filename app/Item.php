<?php

namespace App;
use App\Category;
use App\Place;
use App\Condition;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=['name','slug','image','item_id','category_id','place_id','bought_at','cost','description'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
    public function conditions()
    {
        return $this->belongsToMany('App\Condition');
    }
}
