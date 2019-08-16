<?php

namespace App;
use App\Item;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable= ['condition'];
    
    public function items()
    {
        return $this->belongsToMany('App\Item');
    }    
}
