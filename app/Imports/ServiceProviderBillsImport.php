<?php

namespace App\Imports;

use App\serviceProviderBill;
use App\serviceProvider;
use App\register;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Maatwebsite\Excel\Concerns\skipsOnError;
use Throwable;

class ServiceProviderBillsImport implements ToModel,  withHeadingRow, skipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {    
        $user=serviceProvider::All()->where('user_number',$row['user_number'])->first();
        //dd($user->id);
       if($user){
        $bill=$user->register;
        //dd($bill);
        if ($bill) {
            /* Changing the status of the user into Not paid*/
            $user->Payment_status = 0;
            $user->save();
            //dd('data');
            return new serviceProviderBill([
                'register_id' => $bill->id, 
                'last_reading' => $row['last_reading'],
                'current_reading' => $row['current_reading'],
                'receipt_number' => $row['receipt_number'],
                'bill_amount' => $row['bill_amount'],
            ]);
        }else{
            //dd('empty');
            return new serviceProviderBill([
                //
            ]);
        }}
        else{
            return new serviceProviderBill([
                //
            ]);

        }
        
    }
    public function onError(Throwable $error)
    {

    }
}
