<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public function tickets(){
        return $this->belongsToMany('App\Ticket');
    }

    public function category(){
        return $this->belongsTo('App\EquipmentCategory');
    }
}
