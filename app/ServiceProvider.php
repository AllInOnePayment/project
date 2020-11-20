<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    protected $fillable = [
        'user_number', 'user_name', 'addres','status','payment_status','service_id',
    ];

    public function service(){
        return $this->belongsTo('App\Service');
    }
    public function register(){
        return $this->hasOne('App\Register');
    }
}
