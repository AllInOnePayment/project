<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ServiceProvider;
use App\School;
use App\SchoolInfo;
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
        $this->middleware('service');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $sid=session()->get('service_id');
        $gid=session()->get('group');
        $index=0;
        $filter="";
        if($gid==3)
        {
              $data=ServiceProvider::all()->where('service_id',$sid)->where('status',1);
              $datagrade="";
        }
        else{

            $data=School::all()->where('service_id',$sid)->where('status',1);
            $datagrade=SchoolInfo::all()->where('service_id',$sid)->first();
            }

        return view('service.user.index',['data'=>$data,'index'=>$index,'filter'=>$filter,'datagrade'=>$datagrade]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $sid=session()->get('service_id');
        $data=SchoolInfo::all()->where('service_id',$sid)->first();
        return view('service.user.create',['data'=>$data]);
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

        $gid=session()->get('group');
        
        $sid=session()->get('service_id');
        if($gid==3)
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

            $user->address=$request->address;
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
        $gid=session()->get('group');
        $sid=session()->get('service_id');
        if($gid==3)
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
        $gid=session()->get('group');
        $sid=session()->get('service_id');
        if($gid==3)
        {
              $data=ServiceProvider::find($id);
              $datagrade="";
        }
        else{
             $data=School::find($id);
             $datagrade=SchoolInfo::all()->where('service_id',$sid)->first();
            }
        
        return view('service.user.edit',['data'=>$data,'datagrade'=>$datagrade]);
    }
    public function adduser($id)
    {
        
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
        $gid=session()->get('group');
        $sid=session()->get('service_id');
        if($gid==3)
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
             
            $data->save();
        }
        else{
            $data=School::find($id);
            $data->user_number=$request->user_number;
            $data->service_id=$data->service_id;
            $data->user_name=$request->user_name;
            $data->level=$request->level;
            $data->address=$request->address;
            $data->class=$request->class;
            //$data->status=$request->status; 
           
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
        $gid=session()->get('group');
        $sid=session()->get('service_id');
        if($gid==3)
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
