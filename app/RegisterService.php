<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterService extends Model
{
    public function serviceList(){
        return $this->belongsTo('App\ServiceList');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function school(){
        return $this->belongsTo('App\School');
    }
    public function serviceProvider(){
        return $this->belongsTo('App\ServiceProvider');
    }
    public function schoolBill(){
        return $this->hasOne('App\SchoolBill');
    }
    public function serviceProviderBill(){
        return $this->hasOne('App\ServiceProviderBill');
    }
}
