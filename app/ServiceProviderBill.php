<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProviderBill extends Model
{
    protected $fillable = [
        'register_id','last_reading', 'current_reading', 'receipt_number', 'bill_amount',
    ];

    public function register(){
        return $this->belongsTo('App\Register');
    }
}
