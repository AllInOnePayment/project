<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\MobileBank;  
use App\Transaction\PaymentGatewayContract;
use Illuminate\Support\Facades\Session; 
use Flash;

class TransactionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
    	$user = User::all()->where('service_id',1);
    	$bank = MobileBank::all();
    	return view('transaction.index')
    				->with('userlist',$user)
    				->with('banklist',$bank);
    }

    public function deposite(PaymentGatewayContract $paymentGatewat)
    {  
        if($paymentGatewat->withdraw() == 1)
        {
             Flash::success('You Have Deposited Your Money Successfully');
             return redirect()->route('userprofile');
        }
        else if($paymentGatewat->withdraw() == 2)
        {
             Flash::success('Their Was Error in Connection');
             return redirect()->route('userprofile');
        }
        else if($paymentGatewat->withdraw() == 3)
        {
             Flash::error('You Have No Enough Balance In Your Account');
             return redirect()->route('userprofile');
        }
        else if($paymentGatewat->withdraw() == 4)
        {
             Flash::error('You Dont Have Account By This Phone Number');
             return redirect()->route('userprofile');
        }
        else
        {
            Flash::warning('There Was Error, Please Try Agian');
            return redirect()->route('userprofile');
        }
    }

    public function withdraw(PaymentGatewayContract $paymentGatewat)
    {  
        
        if($paymentGatewat->deposite() == 1)
        {
             Flash::success('You Have Deposited Your Money Successfully');
             return redirect()->route('userprofile');
        }
        else if($paymentGatewat->deposite() == 2)
        {
             Flash::success('Their Was Error in Connection');
             return redirect()->route('userprofile');
        }
        else if($paymentGatewat->deposite() == 3)
        {
             Flash::error('You Have No Enough Balance In Your Account');
             return redirect()->route('userprofile');
        }
         else if($paymentGatewat->withdraw() == 4)
        {
             Flash::error('You Dont Have Account By This Phone Number');
             return redirect()->route('userprofile');
        }
        else
        {
            Flash::warning('There Was Error, Please Try Agian');
            return redirect()->route('userprofile');
        }
    }
}
