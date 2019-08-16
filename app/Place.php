<?php

namespace App;
use App\Item;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['place_name','picture'];

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
