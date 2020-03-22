<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolBill extends Model
{
    public function register(){
        return $this->belongsTo('App\Register');
    }
}
