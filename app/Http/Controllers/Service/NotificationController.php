<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
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
    public function index(Request $request)
    {
        // if ($request->input('date')) {
        //     dd($request->input('date'));
        // }
        // if (false) {
        //     $tDate=date('d');
        //     $paymentDate=5;
        //     $startDate=(($paymentDate-5) % 30);
        //     $dayLeft=$paymentDate-$tDate;
        //     if ($tDate<$paymentDate && $tDate>$startDate) {
        //         $notification=new Notification();
        //         $notification->service_id=session()->get('service_id');
        //         $notification->title="Payment is soon";
        //         $notification->notification="$dayLeft days left for payment";
        //         $notification->save();
        //     }elseif ($tDate==$paymentDate) {
        //         $notification=new Notification();
        //         $notification->service_id=session()->get('service_id');
        //         $notification->title="Payment Day";
        //         $notification->notification="Dear customer, it is a payment day, pay your bill";
        //         $notification->save();
        //     }elseif ($tDate==($paymentDate+8)%30) {
        //         $notification=new Notification();
        //         $notification->service_id=session()->get('service_id');
        //         $notification->title="Payment Day finished";
        //         $notification->notification="Dear customer, contact your service provider and pay your penality";
        //         $notification->save();
        //     }
        // }
        
        $notification=Notification::all()->where('service_id',session()->get('service_id'));
        $index=0;
        return view('service.notification.index',['notification'=>$notification,'index'=>$index]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $check=Notification::all()->where('service_id',session()->get('service_id'))->where('status',$request->input('status'))->first();
        if (!$check) {
            $notification=new Notification();
            $notification->service_id=session()->get('service_id');
            $notification->title=$request->input('title');
            $notification->notification=$request->input('body');
            $notification->status=$request->input('status');
            $notification->save();
        }else {
            $notification=Notification::find($check->id);
            $notification->service_id=session()->get('service_id');
            $notification->title=$request->input('title');
            $notification->notification=$request->input('body');
            $notification->save();
        }
       
        
        return redirect()->route('ServiceNotification.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification=Notification::find($id);
        return view('service.notification.show',['notification'=>$notification]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification=Notification::find($id);
        return view('service.notification.edit',['notification'=>$notification]);
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
        $notification=Notification::find($id);
        $notification->service_id=session()->get('service_id');
        $notification->title=$request->input('title');
        $notification->notification=$request->input('body');
        $notification->status=$request->input('status');
        $notification->save();
        
        return redirect()->route('ServiceNotification.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notification::destroy($id);
        return redirect()->route('ServiceNotification.index');
    }
}
