<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolBill extends Model
{
    protected $fillable = [
        'register_id','school_bill', 'transport_bill', 'other_bill', 'receipt_number', 'total_amount', 
    ];
    public function register(){
        return $this->belongsTo('App\Register');
    }
}
