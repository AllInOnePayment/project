<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Register;
use App\Service;
use App\history;
use App\MobileBank;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user['listuser'] = User::where('service_id',1)->paginate(2);
        $services['services'] = Service::all(); 
        return view('admin.user.listuser')->with($user)->with($services)->with('var',0);
    }


    /*  A FUNCTION WHIC WILL BE RESPONSIBLE TO DISPLAY FILTERED USER LIST */

    public function filter(Request $request)
    {
        $type = $request->type;
        $service = $request->service;
        $services['services'] = Service::all(); 
        if ($type==1) {
            $filter['listuser'] = Register::where('service_id',$service)->paginate(10);
            return view('admin.user.listuser')->with($filter)->with($services)->with('var',1);
        }
        else
        {
            $filter['listuser'] = User::where('service_id',$service)->paginate(5);
            return view('admin.user.listuser')->with($filter)->with($services)->with('var',0);
        }

    }




    /*public function index2()
    {
        return view('admin.user.update');
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serList = Service::where('service_name','AllinOneUser')->get();
        return view('admin.user.create')->with('servicelist',$serList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if ($request->hasFile('userphoto')) {
            // Get filename with the extendsion
            $filenameWithExt = $request->file('userphoto')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get Just Extenstion
            $extension = $request->file('userphoto')->getClientOriginalExtension();

            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Upload to database
            $path = $request->file('userphoto')->storeAs('public/avator', $filenameToStore);
        }
        else
        {
            $filenameToStore='noImage.jpg';
        }
        $user->image = $filenameToStore;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;        
        $user->service_id = 1; 
        $user->password = Hash::make($request->pass);
        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $bank = MobileBank::all();
        return view('admin.user.userdetail')->with('user',$user)
                    ->with('bank',$bank);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        $arr['user'] = $user;
        $sername = Service::find($user->service_id); 
        return view('admin.user.edit')->with($arr)->with('servicename',$sername);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (isset($request->photo)) {

            $ext = $request->photo->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,9999).'.'.$ext;
            $request->photo->storeAs('public/avator',$file);
        }
        else
        {
            if (!$user->image) {
                $file = '';
            }
            else
                $file = $user->image;
        }
        $user->image = $file;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;       
        $user->service_id = 0;
        $user->password = $request->pass;
        $user->save();
        return redirect()->route('admin.user.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.user.index'); 
    }
}
