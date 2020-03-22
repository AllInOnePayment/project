<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\service;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        //return view('home');
        if(Auth::user()->service_id == 1)
        {
            return redirect('/main');
        }
        elseif(Auth::user()->service_id == 2)
        {
            return redirect('/manage_user');
        }
        else
        {   
            $d=Service::all()->where('service_id',Auth::user()->service_id);
        
            foreach($d as $a)
            { 
                session()->put('service_name',$a->service_name); 
                session()->put('service_id',$a->id); 
            }
            return redirect('/manage_service_user');
        }

    }
}
