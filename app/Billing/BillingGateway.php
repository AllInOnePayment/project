<?php 

namespace App\Billing;

use Illuminate\Support\Str;
use App\Bank;
use App\Transaction;
use App\Register;
use App\Service;
use App\ServiceProvider;
use App\ServiceProviderBill;
use App\School;
use App\SchoolBill;
use App\History; 
use App\User;
use Flash;
use Illuminate\Support\Facades\Auth;
/**
 * 
 */
class BillingGateway
{

	private $id; 

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function pay()
	{
        $count = 0;
		$reg=Register::Find($this->id);
        $serviceFee = 3;
        $money=Auth::User()->bank->balance;
        if ($reg->service->group==3) {
            $bill=$reg->serviceProviderBill;
            $amount=$bill->bill_amount;
            if($amount<=$money){

                $account=Auth::User()->bank;
                $account->balance=$money-($amount + $serviceFee);
                $count = $count + 1;
                //$account->save();

                /* Adding the fee into the admins bank account   */
                $adminbank = Bank::find(1); 
                $adminbank->balance = $adminbank->balance + $serviceFee;
                $count = $count + 1;
                //$adminbank->save();

                /* Adding the bill paid money into the service providers bank account */
                $servicebankid2 = $reg->service->id;  
                $servicebankid = User::all()->where('service_id',$servicebankid2)->first();
                $servicebank = Bank::all()->where('user_id',$servicebankid->id)->first();
                $servicebank->balance = $servicebank->balance + $amount;
                $count = $count + 1;
                //$servicebank->save();


                $userstatus=$reg->serviceProvider;
                $userstatus->Payment_status=1;
                $count = $count + 1;
                //$userstatus->save();

                // adding the payment into payment history with user id
                $history=new History();
                $history->date_payment=date('Y-m-d');
                $history->register_id=$reg->id;
                $history->user_id=Auth::User()->id;
                $history->amount= $amount;
                $history->old_balance=$money;
                $history->current_balance=$money-$amount;
                $history->receipt_number=$bill->receipt_number; 
                $count = $count + 1;
                //$history->save();

                // deleting the bill from bill table for service
                if ($count == 5) { 

                    $account->save();
                    $adminbank->save();
                    $servicebank->save();
                    $userstatus->save();
                    $history->save();
                    $bill->delete();
                    return true; 
                }
                else
                {
                    return false;
                }


            }else{
                return false;
            }
           
        }else{
            $bill=$reg->schoolBill;
            $amount=$bill->total_amount;
            if($amount<=$money){
                
                $account=Auth::User()->bank;
                $account->balance=$money-$amount;
                $account->save();
 				
 				/* Adding the fee into the admins bank account   */
                $adminbank = Bank::find(1);
                $adminbank->balance = $adminbank->balance + $serviceFee;
                $adminbank->save();

                /* Adding the bill paid money into the service providers bank account */
                $servicebankid2 = $reg->service->id;  
                $servicebankid = User::all()->where('service_id',$servicebankid2)->first();
                $servicebank = Bank::all()->where('user_id',$servicebankid->id)->first();
                $servicebank->balance = $servicebank->balance + $amount;
                $servicebank->save();


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
                $history->save();  

                // deleting the bill from bill table for service
                $bill->delete(); 
 
                return true;

            }else{
                return false;
            }
        }
	}
 
}