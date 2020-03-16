<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\RegisterService;
use App\ServiceList;

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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list['servicelist'] = ServiceList::all();
        return view('admin.service.listservice')->with($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ServiceList $service)
    { 
        /*$service->service_id = $request->id;
        $service->service_name = $request->name;
        $service->http = $request->http;
        $service->mobile_bank_id = $request->mobile;
        $service->bank_account = $request->bank;
        $service->save();
        return view('admin.service.index');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceList $service)
    {
        $arr['serviceInfo'] = $service;
        return view('admin.service.editservice')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceList $service)
    {
        $service->service_id = $request->id;
        $service->service_name = $request->name;
        $service->http = $request->http;
        $service->mobile_bank_id = $request->mobile;
        $service->bank_account = $request->bank;
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
        //
    }
}
