<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Register;
use App\History;
use App\SchoolInfo;
use App\SchoolBill;
use App\ServiceProviderBill;


class HistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

            $sid=session()->get('service_id');
            $datahistory=History::all();
            $dataserviceid=Register::all()->where('service_id',$sid);
            $array = [];
            $count = 0;
            foreach($datahistory as $dh)
            {
                foreach($dataserviceid as $ds)
                { 
                   if($dh->register_id==$ds->id)
                   { 
                        $array[$ds->id] = $dh->id;
                        $count = $count + 1;
                   }
                }
            }
          
            return view ('service.history',['array'=>(array_values($array)),'datahistory'=>$datahistory,'count'=>$count]);


    }

}
