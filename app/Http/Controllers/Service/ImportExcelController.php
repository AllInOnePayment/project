<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;


class ImportExcelController extends Controller
{
    //
    function import_user(Request $request){
        $this->validate($request, [
            'select_user' => 'required|mimes:xls,xlsx'
        ]);
        $path=$request->file('select_user')->getRealPath();
        $data=Excel::load($path)->get();
        $sid=session()->get('service_id');
        if ($data->count() > 0) {
            
            if($sid==3 || $sid==4 || $sid==5) {
                foreach ($data->toArray() as $key => $value) {
                    foreach ($value as $row) {
                        $insert_data[]= array(
                                'user_number' => $row['user_number'], 
                                'service_id' => $row['user_number'],
                                'user_name' => $row['user_name'],
                                'addres' => $row['addres'],
                                'statue' => 0,
                                'Payment_statues' => 0  
                        );
                    }
                }
            }else{
                foreach ($data->toArray() as $key => $value) {
                    foreach ($value as $row) {
                        $transport=0;
                        if ($row['transport']=='yes') {
                            $transport=1;
                        }else{
                            $transport=0;
                        }
                        $insert_data[]= array(
                                'user_number' => $row['user_number'], 
                                'service_id' => $row['user_number'],
                                'user_name' => $row['user_name'],
                                'level' => $row['grade'],
                                'department' => $row['department'],
                                'class' => $row['class'],
                                'transport' => $transport,
                                'statue' => 0,
                                'Payment_statues' => 0  
                        );
                    }
                }
            }
        }

        if (!empty($insert_data)) {
            if ($sid==3 || $sid==4 || $sid==5) {
                DB::table('service_providers')->insert($insert_data);
            } else {
                DB::table('schools')->insert($insert_data);
            }
            
            
        }
     return back()->with('success','Excel data imported successfully.');   
    }
}
