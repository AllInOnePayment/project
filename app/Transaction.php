<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

	protected $fillable = [
        'user_id','mobile_bank_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function mobileBank(){
        return $this->belongsTo('App\MobileBank');
    }
}
