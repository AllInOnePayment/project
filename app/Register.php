<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    public function service(){
        return $this->belongsTo('App\Service');
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
    public function history(){
        return $this->hasMany('App\History');
    }
}
