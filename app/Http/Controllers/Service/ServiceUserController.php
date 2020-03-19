<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ServiceProvider;
use App\School;
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
    {   $id=session()->get('service_id');
        
        if($id==2 || $id==3 || $id==4)
        {
              $data=DB::table('service_providers')->whereService_idAndStatus($id, 0)->get();
            
        }
        else{
            $data=DB::table('schools')->whereService_idAndStatus($id, 0)->get();
            
        }
        return view('service.user.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=session()->get('service_id');
        
        if($id==2 || $id==3 || $id==4)
        { // insert in to ServiceProvider model
             
            
        }
        else{
            // insert in to School model
            
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=session()->get('service_id');
        
        if($id==2 || $id==3 || $id==4)
        { // insert in to ServiceProvider model
             
            
        }
        else{
            // insert in to School model
            
        }
        return view('service.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id=session()->get('service_id');
        
        if($id==2 || $id==3 || $id==4)
        { // insert in to ServiceProvider model
             
            
        }
        else{
            // insert in to School model
            
        }
        return view('service.user.edit');
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
        //
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
