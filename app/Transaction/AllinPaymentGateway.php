<?php 

namespace App\Transaction;

use Illuminate\Support\Str;
use App\Bank;
use App\Transaction;
use DB;
use App\User;
/**
 * 
 */
class AllinPaymentGateway implements PaymentGatewayContract
{

	private $user;
	private $amount;
	private $phone;
	private $bank;
	public  $status;
	public function __construct($user,$amount, $phone,$bank)
	{
		$this->user = $user;
		$this->amount = $amount;
		$this->phone = $phone;
		$this->bank = $bank;
	}

	public function withdraw()
	{
		$phone = $this->phone;
		//dd($phone);
$bankbalance = DB::connection('mysql2')->select('SELECT * FROM allinpay WHERE phone=?',[$phone]);
if (count($bankbalance)==0) 
{
  	return 4;	
}
else
{
	foreach ($bankbalance as $row) {$balancebank = $row->balance;}

		if ($balancebank > $this->amount) {
			//UPDATE `allinpay` SET `id`=[value-1],`phone`=[value-2],`balance`=[value-3] WHERE 1
			$amountleft = $balancebank - $this->amount; 

			$userbank = Bank::all()->where('user_id',$this->user)->first(); 
			$userbank->balance = $userbank->balance + $this->amount;
			//$userbank->save();
			
			//Adding transaction into transaction table
			$trans = new Transaction();
			$trans->user_id = $this->user;
			$trans->mobile_bank_id = $this->bank;
			$trans->amount = $this->amount;
			//$trans->save();

			$adminphone = User::all()->where('service_id',2)->first();
			$adminhelloamount = DB::connection('mysql2')->select('SELECT * FROM allinpay WHERE phone=?',[$adminphone->phone]);
			foreach ($adminhelloamount as $row) {$adminamount = $row->balance;}
			$admintotalamount = $this->amount + $adminamount;

			if ($userbank->save() && $trans->save()) {  
				$bankbalance2 = DB::connection('mysql2')
				->select('UPDATE allinpay SET balance=? WHERE phone=?',[$amountleft,$phone]);
				
				$adminbalance = DB::connection('mysql2')
				->select('UPDATE allinpay SET balance=? WHERE phone=?',[$admintotalamount,$adminphone->phone]);
				return 1;
			}
			else
			{
				return 2;
			}
		}
		else
		{
			return 3;
		}
}	 	
		
	}


	public function deposite()
	{
	
		$phone = $this->phone;
$bankbalance = DB::connection('mysql2')->select('SELECT * FROM allinpay WHERE phone=?',[$phone]);
if (count($bankbalance)==0) 
{
  	return 4;	
}
else
{
	foreach ($bankbalance as $row) {$balancebank = $row->balance;}

		$amountuser = $this->amount;
		$userbank = Bank::all()->where('user_id',$this->user)->first();

		if ($userbank->balance > $this->amount) 
		{
		 	$userbank->balance = $userbank->balance - $amountuser;
			//$userbank->save();
			
			//Adding transaction into transaction table
			$trans = new Transaction();
			$trans->user_id = $this->user;
			$trans->mobile_bank_id = $this->bank;
			$trans->amount = -$amountuser;
			//$trans->save();

			$adminphone = User::all()->where('service_id',2)->first();
			$adminhelloamount = DB::connection('mysql2')->select('SELECT * FROM allinpay WHERE phone=?',[$adminphone->phone]);
			foreach ($adminhelloamount as $row) {$adminamount = $row->balance;}
			$admintotalamount =  $adminamount - $this->amount;

			$amountleft = $balancebank + $amountuser;
			if ($userbank->save() && $trans->save()) {  
				$bankbalance2 = DB::connection('mysql2')
				->select('UPDATE allinpay SET balance=? WHERE phone=?',[$amountleft,$phone]);

				$adminbalance = DB::connection('mysql2')
				->select('UPDATE allinpay SET balance=? WHERE phone=?',[$admintotalamount,$adminphone->phone]);
				return 1;
			}
			else
			{
				return 2;
			}
		 } 
		 else
		 {
		 	return 3;
		 } 
}		
		
	}
}