<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ServiceProvider;
use App\School;
use App\SchoolInfo;


class FilterController extends Controller
{
    function index(Request $request){
        $sid=session()->get('service_id');
        $index=0;
        
        $gid=session()->get('group');
        if($gid==3)
        {
            $filter = array('status' =>$request->status ,
                        'payment'=>$request->payment);


            if ($request->status=="all" && $request->payment=="all") {
                $data=ServiceProvider::all()->where('service_id',$sid);
            }elseif ($request->status=="all" && $request->payment !="all") {
                $data=ServiceProvider::all()->where('service_id',$sid)->where('Payment_status',$request->payment);
            }elseif (!$request->status=="all" && $request->payment=="all") {
                $data=ServiceProvider::all()->where('service_id',$sid)->where('status',$request->status);
            }else{
                $data=ServiceProvider::all()->where('service_id',$sid)->where('status',$request->status)->where('Payment_status',$request->payment);
            }
            $datagrade="";
        }
        else{   $datagrade=SchoolInfo::all()->where('service_id',$sid)->first();
            $filter = array('status' =>$request->status ,
                        'payment'=>$request->payment,
                        'transport'=>$request->transport,
                        'grade'=>$request->grade,
                        'class'=>$request->class);

            if($request->status=="all"){
                $status='';
            }else{
                $status=' and status='.$request->status;
            }
            if($request->payment=="all"){
                $payment='';
            }else{
                $payment=' and Payment_status='.$request->payment;
            }
            if($request->grade=="all"){
                $grade='';
            }else{
                $grade=' and level='.$request->grade;
            }
            if($request->class=="all"){
                $class='';
            }else{
                $class=' and class="'.$request->class.'"';
            } 
            $sql='select * from schools where service_id = '. $sid .''.$status.''.$payment.''.$grade.''.$class;
            
            $data = DB::select($sql); 

            }
        return view('service.user.index',['data'=>$data,'index'=>$index,'filter'=>$filter,'datagrade'=>$datagrade]);
    }

    function filterAll(){
        
    }
}
