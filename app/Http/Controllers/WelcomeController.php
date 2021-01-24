<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SuggestionMail;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
    	$details = [ 
    	'email' => $request->email,
    	'name' => $request->name,
    	'phone' => $request->phone,
        'subject' => $request->subject,
    	'message' => $request->message,
        'to' => 'allinonebillingsystem@gmail.com',
    	];

    	$to = "allinonebillingsystem@gmail.com";

    	Mail::to($to)->send(new SuggestionMail($details));

    	return view('welcome');
    }
}
