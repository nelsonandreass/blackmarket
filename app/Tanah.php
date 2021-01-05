<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    protected $guarded = [];  
    public function Cart(){
        return $this->belongsTo(Cart::class,'tanahid','id');
    }
}
