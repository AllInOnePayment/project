<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\MobileBank;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth'); 
    } 

    public function index()
    {
		 $userid = Auth::user()->id;  
		 $user = User::find($userid);
		 return view('user.profile.index')
		 			->with('profile',$user);
    }

    public function deposite()
    {
    	 $banklist = MobileBank::all();
    	 return view('user.transaction.index')
    	 			->with('banklist',$banklist);	 
    }

    public function starttransaction(PaymentGatewayContract $paymentGatewat)
    {
    	$trana = $paymentGatewat->withdraw()->status;
    	if($trana){ 
    		return redirect()->route('userprofile');
    	} 
    	else
    	{
    		return redirect()->route('userprofile');
    	}
    }

    public function edit()
    {
    	 $userid = Auth::user()->id;  
		 $user = User::find($userid);
		 return view('user.profile.edit')
		 			->with('profile',$user);
    }

    public function update(Request $request,$id)
    {
    	 if ($request->hasFile('customerphoto')) {
            // Get filename with the extendsion
            $filenameWithExt = $request->file('customerphoto')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get Just Extenstion
            $extension = $request->file('customerphoto')->getClientOriginalExtension();

            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Upload to database
            $path = $request->file('customerphoto')->storeAs('public/avator', $filenameToStore);
        }
        else
        {
            $filenameToStore='noImage.jpg';
        }
		 $user = User::find($id);
		 $user->name = $request->name;
		 $user->phone = $request->phone;
		 $user->image = $filenameToStore;
		 $user->password = Hash::make($request->password);
		 $user->save();
		 
    		return redirect()->route('userprofile'); 

    }
}
