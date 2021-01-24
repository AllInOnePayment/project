<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\MobileBank;
use App\Register;
use App\Transaction;
use Flash;

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
         $register = Register::all()->where('user_id',$userid);
         $transaction = Transaction::all()->where('user_id',$userid)->take(3);
		 return view('profile.index')
		 			->with('profile',$user)
                    ->with('registered',$register)
                    ->with('transaction',$transaction);
    }

    public function deposite()
    {
    	 $banklist = MobileBank::all();
    	 return view('transaction.index')
    	 			->with('banklist',$banklist);	 
    }

    public function withdraw()
    {
        $banklist = MobileBank::all();
         return view('transaction.indexwitdraw')
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
		 return view('profile.edit')
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
		 $user->save();
		 
    		return redirect()->route('userprofile'); 

    }

    public function changepass()
    {
         $userid = Auth::user()->id;  
         $user = User::find($userid);
        return view('profile.changepass')->with('user',$user);
    }

    public function updatepass(Request $request)
    {
        $old = $request->oldpass;
        $oldc = $request->confirmpass;
        $new = $request->newpass;

        $userid = Auth::user()->id;  
        $user = User::find($userid);

        if(Hash::check($old, $user->password))
        {
            if (strlen($new)>=8) {
                if($new == $oldc){ 
                    $user->password=Hash::make($new);
                }
                else
                { 
                Flash::warning('Password Did Not Match');
                return view('profile.changepass')->with('user',$user);
                }
            }
            else
            {                   
                Flash::warning('Password Must Be Greater Than 8 Characters');
                return view('profile.changepass')->with('user',$user);
            }
        }
        else
        {
            Flash::warning('Wrong Password Entered');
            return view('profile.changepass')->with('user',$user);
        }

        $user->save();
        return redirect()->route('userprofile');
    }
}
 