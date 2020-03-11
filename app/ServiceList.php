<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    public function mobileBankList(){
        return $this->belongsTo('App\MobileBankList');
    }
    public function user(){
        return $this->hasMany('App\User');
    }
    public function school(){
        return $this->hasMany('App\School');
    }
    public function serviceProvider(){
        return $this->hasMany('App\ServiceProvider');
    }
    public function newsInfo(){
        return $this->hasMany('App\NewsInfo');
    }
    public function notification(){
        return $this->hasMany('App\Notification');
    }
    public function history(){
        return $this->hasMany('App\History');
    }
    public function registerService(){
        return $this->hasMany('App\RegisterService');
    }
}
