<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendInfoMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Events\NewsForAllCustomerEvent;

class MailController extends Controller
{
    public function index()
    {
    	$managers = User::where('service_id','>=',3)->paginate(10);
    	return view('admin.emails.index')
    				->with('managerlist',$managers);
    }

    public function create($id)
    { 
    	$manager = User::find($id);
    	return view('admin.emails.create')
    				->with('manager',$manager);
    }

    public function send(Request $request, $id)
    {
    	$managersend = User::find($id);
    	$detials = [ 
    		'body'  => $request->message
    	];

    	Mail::to($managersend->email)->send(new SendInfoMail($detials));
        
    	return redirect()->route('sendmail');
    }

    public function mailcustomer()
    {
        return view('admin.emails.customercreate');
    }

    public function sendcustomer(Request $request)
    {
        $user = User::all(); 
        $message = $request->message;
        event(new NewsForAllCustomerEvent($user, $message));
        return redirect()->route('sendmail');

    }

}
