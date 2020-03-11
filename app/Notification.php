<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function serviceList(){
        return $this->belongsTo('App\ServiceList');
    }
    
}
