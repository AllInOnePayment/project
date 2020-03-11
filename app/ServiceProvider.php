<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    public function serviceList(){
        return $this->belongsTo('App\ServiceList');
    }
    public function registerService(){
        return $this->hasOne('App\RegisterService');
    }
}
