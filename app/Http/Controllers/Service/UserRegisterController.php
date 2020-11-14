<?php

namespace App\Http\Controllers\service;

use App\serviceProvider;
use App\user;
use Illuminate\Support\Facades\Hash;
use App\register;
use App\school;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function index($id){
       
      $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
              $data=ServiceProvider::find($id);
        }
        else{
             $data=School::find($id);
           
            }
        
        return view('service.user.userregister',['data'=>$data]);

    }
    public function store(Request $r,$id){
        $id=$r->id;
        $data=request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data['service_id']=1;
        $data['password']= Hash::make($data['password']);
        User::create($data);

        $newdataa=new Register();
        $sid=session()->get('service_id');
        $user=User::all()->where('email',$data['email'])->first();
        
        if($sid==3 || $sid==4 || $sid==5)
        {
              $dataa=ServiceProvider::find($id);
              $newdataa->service_provider_id= $dataa->id;
              $newdataa->service_id=$sid;
              $newdataa->user_id=$user->id;
              
              $dataa->status=1;
        }
        else{
             $dataa=School::find($id);
             $newdataa->school_id= $dataa->id;
             $newdataa->service_id=$sid;
             $newdataa->user_id=$user->id;
             $dataa->status=1;
            }
           
          // $newdata->user_id=$data->id;
             $newdataa->save();
             $dataa->save();
        
             return redirect()->route('ServiceUser.show',$id);
    }
    public function edit($id){
        $sid=session()->get('service_id');
        if($sid==3 || $sid==4 || $sid==5)
        {
              $dataa=ServiceProvider::find($id);
        }
        else{
            $dataa=School::find($id);
        }
        return view('service.user.select',['data'=>$data]);

    }
}
