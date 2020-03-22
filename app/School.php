<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function service(){
        return $this->belongsTo('App\Service');
    }
    public function register(){
        return $this->hasOne('App\Register');
    }

}
