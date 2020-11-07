<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ServiceProvider;
use App\School;

class FilterController extends Controller
{
    function index(Request $request){
        $sid=session()->get('service_id');
        $index=0;
        
        
        if($sid==3 || $sid==4 || $sid==5)
        {
            $filter = array('status' =>$request->status ,
                        'payment'=>$request->payment);


            if ($request->status=="all" && $request->payment=="all") {
                $data=ServiceProvider::all()->where('service_id',$sid);
            }elseif ($request->status=="all" && !$request->payment=="all") {
                $data=ServiceProvider::all()->where('service_id',$sid)->where('Payment_status',$request->payment);
            }elseif (!$request->status=="all" && $request->payment=="all") {
                $data=ServiceProvider::all()->where('service_id',$sid)->where('status',$request->status);
            }else{
                $data=ServiceProvider::all()->where('service_id',$sid)->where('status',$request->status)->where('Payment_status',$request->payment);
            }
            
        }
        else{
            $filter = array('status' =>$request->status ,
                        'payment'=>$request->payment,
                        'transport'=>$request->transport,
                        'grade'=>$request->grade,
                        'department'=>$request->department,
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
            if($request->department=="all"){
                $department='';
            }else{
                $department=' and department='.$request->department;
            }
            if($request->class=="all"){
                $class='';
            }else{
                $class=' and class='.$request->class;
            }
            $sql='select * from schools where service_id = '. 6 .''.$status.''.$payment.''.$grade.''.$department.''.$class;
            
            $data = DB::select($sql);
            
                        
           /* if ($request->status=="all") {
                if ($request->payment=="all") {
                    if ($request->grade=="all") {
                        if ($request->department=="all") {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('transport',$request->transport);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('transport',$request->transport);
                                }
                            }
                        }else {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('transport',$request->transport);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('department',$request->department);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)->where('department',$request->department)
                                    ->where('transport',$request->transport);
                                }
                            }
                        }
                    }else {
                        if ($request->department=="all") {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('level',$request->grade);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('transport',$request->transport)
                                    ->where('level',$request->grade);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('level',$request->grade);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('transport',$request->transport)->where('level',$request->grade);
                                }
                            }
                        }else {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('level',$request->grade);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('level',$request->grade);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('department',$request->department)->where('level',$request->grade);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('level',$request->grade);
                                }
                            }
                        }
                    }
                }else {
                    
                    if ($request->grade=="all") {
                        if ($request->department=="all") {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('Payment_status',$request->payment);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('transport',$request->transport)
                                    ->where('Payment_status',$request->payment);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('Payment_status',$request->payment);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('transport',$request->transport)->where('Payment_status',$request->payment);
                                }
                            }
                        }else {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('Payment_status',$request->payment);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('Payment_status',$request->payment);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('department',$request->department)->where('Payment_status',$request->payment);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('Payment_status',$request->payment);
                                }
                            }
                        }
                    }else {
                        if ($request->department=="all") {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('transport',$request->transport)
                                    ->where('level',$request->grade)->where('Payment_status',$request->payment);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('level',$request->grade)->where('Payment_status',$request->payment);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('transport',$request->transport)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment);
                                }
                            }
                        }else {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('level',$request->grade)->where('Payment_status',$request->payment);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('level',$request->grade)->where('Payment_status',$request->payment);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('department',$request->department)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment);
                                }
                            }
                        }
                    }
                }
            }else {
                
                if ($request->payment=="all") {
                    if ($request->grade=="all") {
                        if ($request->department=="all") {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('transport',$request->transport)
                                    ->where('status',$request->status);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('transport',$request->transport)->where('status',$request->status);
                                }
                            }
                        }else {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('status',$request->status);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('department',$request->department)->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('status',$request->status);
                                }
                            }
                        }
                    }else {
                        if ($request->department=="all") {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('level',$request->grade)
                                    ->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('transport',$request->transport)
                                    ->where('level',$request->grade)->where('status',$request->status);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('level',$request->grade)->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('transport',$request->transport)->where('level',$request->grade)
                                    ->where('status',$request->status);
                                }
                            }
                        }else {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('level',$request->grade)->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('level',$request->grade)
                                    ->where('status',$request->status);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('department',$request->department)->where('level',$request->grade)
                                    ->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('level',$request->grade)
                                    ->where('status',$request->status);
                                }
                            }
                        }
                    }
                }else {
                    
                    if ($request->grade=="all") {
                        if ($request->department=="all") {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('Payment_status',$request->payment)
                                    ->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('transport',$request->transport)
                                    ->where('Payment_status',$request->payment)->where('status',$request->status);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('Payment_status',$request->payment)->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('transport',$request->transport)->where('Payment_status',$request->payment)
                                    ->where('status',$request->status);
                                }
                            }
                        }else {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('Payment_status',$request->payment)->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('Payment_status',$request->payment)
                                    ->where('status',$request->status);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('department',$request->department)->where('Payment_status',$request->payment)
                                    ->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('Payment_status',$request->payment)
                                    ->where('status',$request->status);
                                }
                            }
                        }
                    }else {
                        if ($request->department=="all") {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment)->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('transport',$request->transport)
                                    ->where('level',$request->grade)->where('Payment_status',$request->payment)
                                    ->where('status',$request->status);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('level',$request->grade)->where('Payment_status',$request->payment)
                                    ->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('transport',$request->transport)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment)->where('status',$request->status);
                                }
                            }
                        }else {
                            if ($request->class=="all") {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('level',$request->grade)->where('Payment_status',$request->payment)
                                    ->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment)->where('status',$request->status);
                                }
                            }else {
                                if ($request->transport=="all") {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)
                                    ->where('department',$request->department)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment)->where('status',$request->status);
                                }else {
                                    $data=School::all()->where('service_id',$sid)->where('class',$request->class)->where('department',$request->department)
                                    ->where('transport',$request->transport)->where('level',$request->grade)
                                    ->where('Payment_status',$request->payment)->where('status',$request->status);
                                }
                            }
                        }
                    }
                }
            }
            */
            }
        return view('service.user.index',['data'=>$data,'index'=>$index,'filter'=>$filter]);
    }

    function filterAll(){
        
    }
}
