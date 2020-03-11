<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProviderBill extends Model
{
    public function registerService(){
        return $this->belongsTo('App\RegisterService');
    }
}
