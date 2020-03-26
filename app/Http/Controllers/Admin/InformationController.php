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

class InformationController extends Controller
{
    
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
}
