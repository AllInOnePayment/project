<?php

namespace App\Imports;

use App\serviceProvider;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Maatwebsite\Excel\Concerns\skipsOnError;
use Throwable;

class ServiceProvidersImport implements ToModel, withHeadingRow, skipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new serviceProvider([
            'user_number' => $row['user_number'], 
            'service_id' => session()->get('service_id'),
            'user_name' => $row['user_name'],
            'addres' => $row['addres'],
            'statue' => 0,
            'Payment_status' => 0
        ]);
    }
    public function onError(Throwable $error)
    {

    }
}
