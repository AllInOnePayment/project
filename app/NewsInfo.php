<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsInfo extends Model
{
    public function serviceList(){
        return $this->belongsTo('App\ServiceList');
    }
}
