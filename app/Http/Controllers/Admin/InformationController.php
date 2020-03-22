<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\MobileBank;
use App\Register;

class InformationController extends Controller
{
    
    public function index()
    {
    	$user  =   User::all();
    	$system =  Service::all();
    	$data = array(
    		'uc' => User::count(),
    		'rc' => Register::count(),
    		'sc' => Service::count(),
    		'bc' => MobileBank::count()); 
    	return view('admin.information.userinfo')
    		->with('userinfo',$user)
    		->with('systemlist',$system)
    		->with($data);
    }
}
