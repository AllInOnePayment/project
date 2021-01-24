<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\service;
use App\ServiceProvider;
use App\school;
use App\register;
use Flash;

class RegisterServiceController extends Controller
{

    public function index()
    {  
        $services=Service::all()->where('group','>',2); 
        return view('user.register.registerService',['services'=>$services]);
    }

    public function register(Request $request ,$id)
    {
        $gid = Service::find($id);
        $newregister = new Register();
        if($gid->group==4)
        {
            $service = 'school_id';
        }
        else {
            $service = 'service_provider_id';
        }

        $count = Register::all()->where('user_id',Auth::user()->id)->where($service,$request->id)->count();
        
        if($count==0){
        if($gid->group==4){
           
            $newregister->user_id=Auth::user()->id;
            $newregister->school_id=$request->id;
            $newregister->service_id=$request->serviceid;

            /* Updating the online status to 1 for each service  */
            $onliestatus = School::all()->where('id',$request->id)->first();
            $onliestatus->status = 1 ;
            $onliestatus->save(); 

        }else{
           
            $newregister->user_id=Auth::user()->id;
            $newregister->service_provider_id=$request->id;
            $newregister->service_id=$request->serviceid;

            /* Updating the online status to 1 for each service  */
            $onliestatus = ServiceProvider::all()->where('id',$request->id)->first();
            $onliestatus->status = 1 ;
            $onliestatus->save();   
        }

        $newregister->save();
        Flash::success("Registered Successfully");
        return redirect()->route('register.users');
    }
    else{ 
        Flash::warning("Already Uses Online Payment | Register For Others ");
        return redirect()->route('register.users');
    }
      

    }

    public function show($id){
               
        $display=0;
        
        return view('user.register.show',['id'=>$id,'display'=>$display]);

    }

    public function display(Request $request , $id)
    {
             
        $display=1;
        $gid=Service::find($id);
       
       
        $sid=session()->get('service_id');
        $count = 0;
        if($gid->group==4){
        $userdata=School::all()->where('user_number',$request->user_number)
                                ->where('service_id',$id)
                                ->first(); 
            if ($userdata != null) {
                  $count = 1; 
              }  
                                                
        }
        else{ 
            
           $userdata=ServiceProvider::all()->where('user_number',$request->user_number)
                                            ->where('service_id',$id)
                                            ->first(); 
            if ($userdata != null) {
                  $count = 1; 
              }       
        }
        
        return view('user.register.show',['userdata'=>$userdata,'display'=>$display,'id'=>$id,'count'=>$count]);


    }



}
