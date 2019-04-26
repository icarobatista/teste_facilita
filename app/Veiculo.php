<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veiculo extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];
    public function marca(){
        return $this->belongsTo('App\Marca');
    }

    public function cor(){
        return $this->belongsTo('App\Cor');
    }
}
