<?php

namespace App\Imports;

use App\schoolBill;
use App\school;
use App\register;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Maatwebsite\Excel\Concerns\skipsOnError;
use Throwable;

class SchoolBillsImport implements ToModel,  withHeadingRow, skipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user=school::All()->where('user_number',$row['user_number'])->first();
        //dd($user->id);
        $bill=$user->register;
        //dd($bill);
        if ($bill) {
            /* Changing the status of the user into Not paid*/
            $user->Payment_status = 0;
            $user->save();
            //dd('data');
            return new schoolBill([
                'register_id' => $bill->id, 
                'school_bill' => $row['school_bill'],
                'transport_bill' => $row['transport_bill'],
                'other_bill' => $row['other_bill'],
                'receipt_number' => $row['receipt_number'],
                'total_amount' => $row['total_amount'],
            ]);
        }else{
            //dd('empty');
            return new schoolBill([
                //
            ]);
        }
    }
    public function onError(Throwable $error)
    {

    }
}
