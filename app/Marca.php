<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //

    public function cores(){
        return $this->belongsToMany('App\Cor');
    }
}
