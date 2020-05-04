<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    public function equipments(){
        return $this->hasMany('App\Equipment');
    }
}
