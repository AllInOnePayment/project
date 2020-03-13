<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
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
        if(Auth::user()->service_id == 0)
        {
            return redirect('/main');
        }
        elseif(Auth::user()->service_id == 1)
        {
            return redirect('/manage_user');
        }
        else
        {
            return redirect('/manage_service_user');
        }

    }
}
