<?php

namespace App\Http\Controllers;

use App\serviceProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Bank;
use App\Service;

class TestsController extends Controller
{
    public function index($id){
        $gid=session()->get('group');
        $sid=session()->get('service_id');
        if($gid==3 )
        {
              $data=ServiceProvider::find($id);
        }
        else{
            $data=School::find($id);
        }
        $datauser=user::all();
        
        return view('service.user.select',['data'=>$data,'datauser'=>$datauser]);
    }
    public function store(){
        $data=request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data['service_id']=2;
        $data['password']= Hash::make($data['password']);
        User::create($data);
        return redirect('/');
    }
    public function relation(){
        $id=1;
       // $user=User::find($id);
       // dd($user->bank);
      // $bank=Bank::find($id);
       //dd($bank->user);
       //$service=Service::find($id);
       //dd($service->user);
       //dd($user->service);
      
    }
}
