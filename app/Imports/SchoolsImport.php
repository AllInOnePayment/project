<?php

namespace App\Imports;

use App\school;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Maatwebsite\Excel\Concerns\skipsOnError;
use Throwable;

class SchoolsImport implements ToModel, withHeadingRow, skipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $transport=0;
        if ($row['transport']=='yes') {
            $transport=1;
        }else{
            $transport=0;
        }
        
        return new school([
            'user_number' => $row['user_number'], 
            'service_id' => session()->get('service_id'),
            'user_name' => $row['user_name'],
            'level' => $row['grade'],
            'address' => $row['address'],
            'class' => $row['class'],
            'transport' => $transport,
            'statue' => 0,
            'Payment_status' => 0  
        ]);
    }
    public function onError(Throwable $error)
    {

    }
}
