<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    public function Tanahs(){
        return $this->hasMany(Tanah::class,'id' , 'tanahid');
    }
    public function Ambulances(){
        return $this->hasMany(Ambulance::class,'id' , 'ambulanceid');
    }
    public function Surats(){
        return $this->hasMany(Surat::class,'id' , 'suratid');
    }
    public function Users(){
        return $this->hasMany(User::class,'id' , 'userid');
    }
}
