<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'user_number', 'user_name', 'level','address','class','status','payment_status','service_id',
    ];

    public function service(){
        return $this->belongsTo('App\Service');
    }
    public function register(){
        return $this->hasOne('App\Register');
    }
}
