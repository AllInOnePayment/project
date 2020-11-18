<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function mobileBank(){
        return $this->belongsTo('App\MobileBank');
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
    public function news(){
        return $this->hasMany('App\News');
    }
    public function notification(){
        return $this->hasMany('App\Notification');
    }
    public function register(){
        return $this->hasMany('App\Register');
    }
    public function schoolinfo(){
        return $this->hasOne('App\SchoolInfo');
    }
}
