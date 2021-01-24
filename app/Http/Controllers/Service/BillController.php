<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ServiceProvider;
use App\School;
use App\SchoolBill;
use App\ServiceProviderBill;
use App\Register;

class BillController extends Controller
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
    {
        $sid=session()->get('service_id');
        $index=0;
        if($sid==3 || $sid==4 || $sid==5)
        {
              //$data=DB::table('service_providers')->whereService_idAndStatus($sid, 0)->get();
              $data=ServiceProvider::all()->where('service_id',$sid)->where('status',1);
              
            
        }
        else{
            //$data=DB::table('schools')->whereService_idAndStatus($sid, 0)->get();
            $data=School::all()->where('service_id',$sid)->where('status',1);
            
        }
        return view('service.bill.index',['data'=>$data,'index'=>$index]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  // dd($request->input('id'));
        $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
            $data=ServiceProvider::find($request->input('id'));
              //$data=ServiceProvider::all()->where('service_id',$sid)->where('status',1);
              }
        else{
            $data=School::find($request->input('id'));
             //$data=School::all()->where('service_id',$sid)->where('status',1);
            
        }
        return view('service.bill.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sid=session()->get('service_id');
        
        if($sid==3 || $sid==4 || $sid==5)
        {
            $user=ServiceProvider::find($request->id);
            $user->Payment_status = 0;
            $user->save();

            $bill=new ServiceProviderbill;
            $bill->register_id=$user->register->id;
            $bill->last_reading=$request->last_reading;
            $bill->current_reading=$request->current_reading;
            $bill->receipt_number=$request->receipt_number;
            $bill->bill_amount=$request->bill_amount; 
            
            $dataid=$bill->register->serviceProvider->id;
            $data=ServiceProvider::find($dataid);
            $data->payment_status=$request->payment_status;
            $data->save();
            $bill->save();
        }
        else{
            $user=School::find($request->id);
            $user->Payment_status = 0;
            $user->save();
            
            $bill=new SchoolBill;
            $bill->register_id=$user->register->id;
            $bill->school_bill=$request->school_bill;
            $bill->other_bill=$request->other_bill;
            $bill->receipt_number=$request->receipt_number;
            $bill->total_amount=$request->total_amount;
            //$bill->status=$request->payment_status;
            if ($request->transport_bill) {
                $bill->transport_bill=$request->transport_bill;
            }
            
            $dataid=$bill->register->school->id;
            $data=School::find($dataid);
           // $data->payment_status=$request->payment_status;
            $data->save();
            $bill->save();
            }
        return redirect()->route('ServiceBill.index');
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
        
        return view('service.bill.show',['data'=>$data]);
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
        }
        else{
             $data=School::find($id);
           
            }
        
        return view('service.bill.edit',['data'=>$data]);
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
            $bill=ServiceProviderbill::find($id);
            $bill->last_reading=$request->last_reading;
            $bill->current_reading=$request->current_reading;
            $bill->receipt_number=$request->receipt_number;
            $bill->bill_amount=$request->bill_amount;

            $dataid=$bill->register->serviceProvider->id;
           
            /*$bill->status=$request->payment_status;
            
            $dataid=$bill->register->serviceProvider->id;
            $data=ServiceProvider::find($dataid);
            $data->payment_status=$request->payment_status;
            $data->save();*/
            $bill->save();
        }
        else{
            $bill=SchoolBill::find($id);
            $bill->school_bill=$request->school_bill;
            $bill->other_bill=$request->other_bill;
            $bill->receipt_number=$request->receipt_number;
            $bill->total_amount=$request->total_amount;
            if ($request->transport_bill) {
                $bill->transport_bill=$request->transport_bill;
            }
            $dataid=$bill->register->school->id;
            
            /*$bill->status=$request->payment_status;
            
            $dataid=$bill->register->school->id;
            $data=School::find($dataid);
            $data->payment_status=$request->payment_status;
            $data->save();*/
            $bill->save();
            }
           
        return redirect()->route('ServiceBill.show',$dataid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $gid=session()->get('group');
        $sid=session()->get('service_id');
        if($gid==3)
        {
            $data=ServiceProvider::find($id);
            $bill=$data->register->serviceProviderBill;
            $bill->delete(); 
            // $billid=$data->register->serviceProviderBill->id;
            // $bill=ServiceProviderbill::find($billid);
            // $bill->last_reading=0;
            // $bill->current_reading=0;
            // $bill->receipt_number=0;
            // $bill->bill_amount=0;
            // $bill->save();

        }
        else{
            $data=School::find($id);
            $bill=$data->register->schoolBill;
            $bill->delete(); 
            // $billid=$data->register->schoolBill->id;
            // $bill=SchoolBill::find($billid);
            // $bill->school_bill=0;
            // $bill->other_bill=0;
            // $bill->receipt_number=0;
            // $bill->total_amount=0;
            // $bill->save();
        }
        

        return redirect()->route('ServiceBill.show',$id);
    }
}
