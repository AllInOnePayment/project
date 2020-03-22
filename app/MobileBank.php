<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileBank extends Model
{
    public function service(){
       return $this->hasMany('App\Service');
    }
    public function transaction(){
        return $this->hasMany('App\Transaction');
    }
}
