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
use App\Migrations;

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
        $transaction = Transaction::all();    
        return view('admin.information.transactioninfo')
                    ->with('transaction',$transaction);
    }

    public function show($id)
    {
        $detail = Transaction::find($id);
        dd($detail);
        return view('admin.information.transactiondetail')
                    ->with('tradetail',$detail);
    }
}
