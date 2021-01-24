<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Service;
use App\Bank;

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
        if(!Auth::user()->bank)
         {
            $bank = new Bank();
            $bank->user_id = Auth::user()->id;
            $bank->balance = 0;
            $bank->save();
         }   
        //return view('home');
        if(Auth::user()->service_id == 1)
        {
            return redirect()->route('user');
        }
        elseif(Auth::user()->service_id == 2)
        {
            return redirect()->route('adminhome'); 
        }
        else
        {   
            $d=Service::all()->where('id',Auth::user()->service_id);
           
            foreach($d as $a)
            { 
                session()->put('service_name',$a->service_name); 
                session()->put('service_id',$a->id); 
                session()->put('group',$a->group);
                
            }
        
           
            return redirect('ServiceUser');
        }

    }
}
