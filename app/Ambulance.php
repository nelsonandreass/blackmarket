<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $guarded = [];  
    public function Cart(){
        return $this->belongsTo(Cart::class,'ambulanceid','id');
    }
}
