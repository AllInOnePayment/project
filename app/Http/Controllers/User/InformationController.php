<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use App\News;
use App\User;
use App\Register;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }


    public function index()
    {
        $news = News::all()->where('expire_date','>',date('Y-m-d'));
        $count = News::all()->where('expire_date','>',date('Y-m-d'))->count();
        return view('user.information.index')
                    ->with('news',$news)
                    ->with('count',$count);
    }

     public function notfication()
    {
        $notifay = Notification::all();
        $user = Register::all()->where('user_id',Auth::user()->id);
        $count = Register::all()->where('user_id',Auth::user()->id)->count();
        
        return view('user.information.notfication')
                    ->with('notfication',$notifay)
                    ->with('user',$user)
                    ->with('count',$count);
    }
}
