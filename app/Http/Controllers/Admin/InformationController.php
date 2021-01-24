<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\MobileBank;
use App\Register;
use App\History;
use App\Transaction; 
use App\Charts\UserChart;

class InformationController extends Controller
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
    
    
    public function index()
    {
    	$user  =   User::all();
    	$data = array(
    		'uc' => User::where('service_id',1)->count(),
    		'rc' => Register::count(),
    		'sc' => History::count(),
    		'bc' => Transaction::count()); 
    	return view('admin.information.userinfo')
    		->with('userinfo',$user)
    		->with($data);
    }
    public function index2()
    { 
    	$system =  Service::all()->where('id','>=',3); 
    	$data = array(
    		'rc' => Register::count(),
    		'tc' => Transaction::count(),
    		'bc' => MobileBank::count(),
    		'sc' => Service::count()); 
    	return view('admin.information.systeminfo') 
    		->with('systemlist',$system)
    		->with($data);
    }
    public function index3()
    { 
        $tables = Migrations::count();
        return view('admin.information.databaseinfo')
                    ->with('tablecount',$tables);
    }

    public function index4()
    { 
 
        $mb = MobileBank::all(); 
        foreach ($mb as $row) 
            {
                $var = $row->id;
                $count = Transaction::where('mobile_bank_id',$var)->count();
                $dataName[$var]=$row->bank_name;
                $dataCount[$var]=$count;
            } 

        $TraChart = new UserChart;
        $TraChart->labels(array_values($dataName));
        $TraChart->dataset('Dataset','bar', array_values($dataCount))
                ->backgroundColor('seagreen');

        $transaction = Transaction::paginate(6);    
        return view('admin.information.transactioninfo')
                    ->with('transaction',$transaction)
                    ->with('TraChart',$TraChart);
    }

    public function show($id)
    {
        $detail = Transaction::find($id);
        dd($detail);
        return view('admin.information.transactiondetail')
                    ->with('tradetail',$detail);
    }
}
