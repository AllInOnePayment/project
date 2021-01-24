<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Billing\BillingGateway;
use App\Register;
use App\Service;
use App\ServiceProvider;
use App\ServiceProviderBill;
use App\School;
use App\SchoolBill;
use App\History;
use App\Bank;
use App\User;
use Flash;

class userBillController extends Controller
{
 

    public function __construct()
    {
        $this->middleware('auth'); 
    }


    public function bill()
    {   $count=1;
        $data=Register::All()->where('user_id',Auth::user()->id);
        
        if ($data->count()==0) {
            $count=0; 
        }
        return view('user.bill.index',['data'=>$data,'count'=>$count]);
    }

    public function pay(BillingGateway $billing)
    { 
        
        if($billing->pay())
        {
            Flash::success('You Have Paid Your Bill');
            return redirect()->route('userBill');
        }
        else
        {
            Flash::error('Their Was Error, Please Try Agian');
            return redirect()->route('userBill');
        }
        
/*
        $reg=Register::Find($id);
        $serviceFee = 3;
        $money=Auth::User()->bank->balance;
        if ($reg->service->group==3) {
            $bill=$reg->serviceProviderBill;
            $amount=$bill->bill_amount;
            if($amount<=$money){

                $account=Auth::User()->bank;
                $account->balance=$money-($amount + $serviceFee);
                $account->save();

                /* Adding the fee into the admins bank account   
                $adminbank = Bank::find(1);
                $adminbank->balance = $adminbank->balance + $serviceFee;
                $adminbank->save();

                /* Adding the bill paid money into the service providers bank account 
                $servicebankid2 = $reg->service->id;  
                $servicebankid = User::all()->where('service_id',$servicebankid2)->first();
                $servicebank = Bank::all()->where('user_id',$servicebankid->id)->first();
                $servicebank->balance = $servicebank->balance + $amount;
                $servicebank->save();


                $userstatus=$reg->serviceProvider;
                $userstatus->Payment_status=1;
                $userstatus->save();

                // adding the payment into payment history with user id
                $history=new History();
                $history->date_payment=date('Y-m-d');
                $history->register_id=$reg->id;
                $history->user_id=Auth::User()->id;
                $history->amount= $amount;
                $history->old_balance=$money;
                $history->current_balance=$money-$amount;
                $history->receipt_number=$bill->receipt_number;
                $history->receipt_file=0;
                $history->save();

                // deleting the bill from bill table for service
                $bill->delete(); 

                return back()->with("success','You have successfully paid tour bill.");

            }else{
                return back()->with("warning','sorry, you don't have enough money to pay this bill.");
            }
           
        }else{
            $bill=$reg->schoolBill;
            $amount=$bill->total_amount;
            if($amount<=$money){
                
                $account=Auth::User()->bank;
                $account->balance=$money-$amount;
                $account->save();
 
                $userstatus=$reg->school;
                $userstatus->Payment_status=1;
                $userstatus->save();

                $history=new History();
                $history->date_payment=date('Y-m-d');
                $history->register_id=$reg->id;
                $history->user_id=Auth::User()->id;
                $history->amount= $amount;
                $history->old_balance=$money;
                $history->current_balance=$money-$amount;
                $history->receipt_number=$bill->receipt_number;
                $history->receipt_file=0;
                $history->save(); 


                // deleting the bill from bill table for service
                $bill->delete(); 
 
                return redirect()->route('userBill')->with("success','You have successfully paid tour bill.");

            }else{
                return back()->with("warning','sorry, you don't have enough money to pay this bill.");
            }
        }*/
        
    }
}
