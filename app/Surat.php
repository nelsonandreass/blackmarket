<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{   
    protected $guarded = [];  
    public function Cart(){
        return $this->belongsTo(Cart::class,'suratid','id');
    }
}
