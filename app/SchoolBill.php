<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolBill extends Model
{
    public function registerService(){
        return $this->belongsTo('App\RegisterService');
    }
}
