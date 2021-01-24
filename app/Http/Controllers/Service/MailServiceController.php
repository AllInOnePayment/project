<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\User;
use App\Register;
use App\ServiceProvider;
use App\School;
use App\Events\SendNotficationToCustomerEvent;
use Illuminate\Http\Request;
use Flash;

class MailServiceController extends Controller
{
    public function index()
    {
        return view('service.emails.index');
    }

    public function send(Request $request)
    {  
        $sid=session()->get('service_id');
        $gid=session()->get('group');
        $req=$request->status;
        if($request->status==4){
            if($gid==3){
                
            $data = ServiceProvider::all()->where('payment_status',0)->where('status',1);
            }
            else {
                
                $data = School::all()->where('payment_status',0)->where('status',1);
            }
        }
        else{   
           $data = Register::all()->where('service_id',$sid);
           
        }
        $message = [
            'subject' => $request->title,
            'body' => $request->body
        ];
        event(new SendNotficationToCustomerEvent($data, $message,$req));

        Flash::success('Email has been send successfully.');
        return view('service.emails.index');
    }
}
