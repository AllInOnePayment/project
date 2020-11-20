<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\serviceProvidersImport;
use App\Imports\schoolsImport;
use App\Imports\serviceProviderBillsImport;
use App\Imports\schoolBillsImport;


class ImportExcelController extends Controller
{
    //
    function import_user(Request $request){
        $this->validate($request, [
            'users' => 'required|mimes:xls,xlsx'
        ]);
        $sid=session()->get('service_id');
        $gid=session()->get('group');
        $user=$request->file('users')->store('import');
        if($gid==3) {
            (new ServiceProvidersImport)->import($user);
        }else{
            (new SchoolsImport)->import($user);  
        }

       

     return back()->with('success','Excel data imported successfully.');   
    }
    function import_bill(Request $request){
        $this->validate($request, [
            'bill' => 'required|mimes:xls,xlsx'
        ]);
        $gid=session()->get('group');
        $sid=session()->get('service_id');
        $bill=$request->file('bill')->store('import');
        if($gid==3) {
            (new ServiceProviderBillsImport)->import($bill);
        }else{
            (new SchoolBillsImport)->import($bill);  
        }


        return back()->with('success','Excel data imported successfully.');  
    }
}
