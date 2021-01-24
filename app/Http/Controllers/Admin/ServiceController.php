<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Register;
use App\Service;
use App\MobileBank;

class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list['servicelist'] = Service::where('id','>=',3)
                    ->paginate(5); 
        return view('admin.service.listservice')->with($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobileList = MobileBank::orderBy('bank_name')->get();
        return view('admin.service.create')->with('mobilelist',$mobileList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {  
        if ($request->hasFile('servicephoto')) {
            // Get filename with the extendsion
            $filenameWithExt = $request->file('servicephoto')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get Just Extenstion
            $extension = $request->file('servicephoto')->getClientOriginalExtension();

            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Upload to database
            $path = $request->file('servicephoto')->storeAs('public/logo', $filenameToStore);
        }
        else
        {
            $filenameToStore='noImage.jpg';
        }
        $service->service_name = $request->name;
        $service->http = $request->http;
        $service->mobile_bank_id = $request->mobilelist;
        $service->bank_account = $request->account;
        $service->payment_start = $request->paymentstart;
        $service->payment_end = $request->paymentend;
        $service->group = $request->group;
        $service->image = $filenameToStore;
        $service->save();
        if ($request->group == 4) {
             return redirect()->route('schoolinfo',$request->name);
        }
        else {
        return redirect()->route('admin.manager.create');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $serlist = Service::find($id);
       $registeredusers = Register::where('service_id',$id)
                        ->paginate(5);
       return view('admin.service.show')
                    ->with('servicelist',$serlist)
                    ->with('registeredusers',$registeredusers); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $arr = Service::all()->where('id',$id);
       $mobileList = MobileBank::orderBy('bank_name')->get();
       return view('admin.service.edit')->with('serviceinfo',$arr)
                    ->with('mobilelist',$mobileList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    { 
        $service->service_name = $request->name;
        $service->http = $request->http;
        $service->mobile_bank_id = $request->mobilelist;
        $service->bank_account = $request->account;
        $service->save();
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->route('admin.service.index'); 
    }
}
