<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\MobileBank;

class ServiceProfileController extends Controller
{
    function index(){
       
        $data=User::find(Auth::user()->id);
       
        return view('service.profile.index',['data'=>$data]);
    }
    function edit(){
        $err_pass="";
        return view('service.profile.edit',['err_pass'=>$err_pass]);
    }
    function picture(Request $request){
        $this->validate($request,[
            'img' => 'required|image|max:1999'
        ]);
        $filenameWithExt=$request->file('img')->getClientOriginalName();
        $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension=$request->file('img')->getClientOriginalExtension();
        $filenameToStore=$filename.'_'.time().'.'.$extension;
        $path=$request->file('img')->storeAs('public/image',$filenameToStore);

        $uid=Auth::user()->id;
        $user=User::find($uid);   
        $user->image=$filenameToStore;
        $user->save();
        return redirect()->route('ServiceProfile');
    }
    function info(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'emall' => 'required|email',
            'phone' => 'required|regex:/^(09)[0-9]{8}$/'
        ]);
        $uid=Auth::user()->id;
        $user=User::find($uid);   
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->save();
       
        return redirect()->route('ServiceProfile.edit');
    }
    function password(Request $request){
        $new_pass="";
        $current_pass="";
        $conform_pass="";
        $uid=Auth::user()->id;
        $user=User::find($uid); 
        
        
        if(Hash::check($request->current_password, $user->password)){
            
            if(strlen($request->new_password)>=8){
                if($request->new_password==$request->conform_password){
                    $user->password=Hash::make($request->new_password);
                }else{
                    $conform_pass="the password must match";
                }
            }else{
                $new_pass="the password must have greater or equal to 8 character";
            }
            
        }else{
            $current_pass="incorrect password";
        }  
        
        $user->save();
        $err_pass=array(
            'current_pass'=>$current_pass,
            'new_pass'=>$new_pass,
            'conform_pass'=>$conform_pass
        );
        
        return view('service.profile.edit',['err_pass'=>$err_pass]);
    } 
    public function editaccount($id){

        $bank=MobileBank::All();
        
       if($id==1){
        return view('service.profile.withdraw',['bank'=>$bank]);
       }
       else{
        return view('service.profile.deposit',['bank'=>$bank]);
       }
    }
}
