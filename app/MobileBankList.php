<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileBankList extends Model
{
    public function serviceList(){
       return $this->hasMany('App\ServiceList');
    }
}
