<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ServiceProvider;
use App\School;
use App\SchoolBill;
use App\ServiceProviderBill;
class ServiceUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $sid=session()->get('service_id');
        $index=0;
        $filter="";
        if($sid==3 || $sid==4 || $sid==5)
        {
              $data=ServiceProvider::all()->where('service_id',$sid)->where('status',1);
        }
        else{
            $data=School::all()->where('service_id',$sid)->where('status',1);
            }
        return view('service.user.index',['data'=>$data,'index'=>$index,'filter'=>$filter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
            $user=new ServiceProvider;
            $user->user_number=$request->user_number;
            $user->service_id=$sid;
            $user->user_name=$request->user_name;
            $user->addres=$request->addres;
            $user->status=0;
            $user->Payment_status=0;

            $user->save();
        }
        else{
            $user=new School;
            $user->user_number=$request->user_number;
            $user->service_id=$sid;
            $user->user_name=$request->user_name;
            $user->level=$request->level;
            $user->department=$request->department;
            $user->class=$request->class;
            $user->transport=$request->transport;
            $user->status=0;
            $user->Payment_status=0;

            $user->save();
            }
            return redirect()->route('ServiceUser.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
              $data=ServiceProvider::find($id);
        }
        else{
             $data=School::find($id);
            
            }
        
        return view('service.user.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
              $data=ServiceProvider::find($id);
        }
        else{
             $data=School::find($id);
            
            }
        
        return view('service.user.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
            $request->validate([
                'user_number'=>"required",
                'user_name'=>"required",
                'addres'=>"required"
            ]);
            $data=ServiceProvider::find($id);
            $data->user_number=$request->user_number;
            $data->service_id=$data->service_id;
            $data->user_name=$request->user_name;
            $data->addres=$request->addres;
            //$data->status=$request->status;
            $data->payment_status=$request->payment_status;
             
            $billid=$data->register->serviceProviderBill->id;
            $bill=ServiceProviderbill::find($billid);
            $bill->status=$request->payment_status;
            
            $bill->save();
            $data->save();
        }
        else{
            $data=School::find($id);
            $data->user_number=$request->user_number;
            $data->service_id=$data->service_id;
            $data->user_name=$request->user_name;
            $data->level=$request->level;
            $data->department=$request->department;
            $data->class=$request->class;
            //$data->status=$request->status;
            $data->payment_status=$request->payment_status;
            
            if ($data->register->schoolBill->id) {
                $billid=$data->register->schoolBill->id;
                $bill=SchoolBill::find($billid);
                $bill->status=$request->payment_status;
                
                $bill->save();
            }
           
            $data->save();
            }
        return redirect()->route('ServiceUser.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleting or changing his online status 
     /*   $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
            $user=ServiceProvider::find($id); 
            $user->status=0;
            $user->save();
        }
        else{
            $data=School::find($id);
            $user->status=0;
            $user->save();
        }
    */
        //deleting user data from the services
        $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
            $user=ServiceProvider::find($id); 
            $user->delete();  
        }
        else{
            $data=School::find($id);
            $user->delete(); 
        }
       
      
      return redirect()->route('ServiceUser.index');
    }
}
