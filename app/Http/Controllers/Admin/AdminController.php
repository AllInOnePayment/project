<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Charts\UserChart;
use App\User;
use App\Register;
use App\History;
use App\Service; 
use App\MobileBank;
use App\School;

class AdminController extends Controller
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
            $userdata = User::all();
            $service = Service::all();
            $data2=[];
            foreach ($service as $row) 
            {
                $var = $row->id;
                $count = Register::where('service_id',$var)->count();
                $data[$var]=$count;
            } 
            $data[1]= User::where('service_id',1)->count();
            $data[2]= User::where('service_id',2)->count();
            $servicedata = Service::pluck('service_name'); 
            $chart = new UserChart;
            $chart->labels($servicedata);
            $chart->dataset('Dataset','bar', array_values($data))
                    ->backgroundColor('seagreen');

                    
            $mobilebank = MobileBank::all();
            $mobilebankname = MobileBank::pluck('bank_name');
            foreach ($mobilebank as $row) 
            {
                $var = $row->id;
                $count = Service::where('mobile_bank_id',$var)->count();
                $data2[$var]=$count;
            }          
            $chart2 = new UserChart;
            $chart2->labels($mobilebankname);
            $chart2->dataset('Dataset','doughnut', array_values($data2))
                    ->backgroundColor(['#2E8B57','#A0E77D','#82B6D9','#7BAED5','#D2BFA1']);

            $schoollist = School::pluck('service_id','user_number');

            return view('admin.home.index', compact('chart','chart2'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
