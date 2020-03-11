<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function serviceList(){
        return $this->belongsTo('App\ServiceList');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
