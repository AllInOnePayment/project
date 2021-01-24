<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewManagerHasRegisteredEvent; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\MobileBank;
use App\Bank;

class AddmanagerController extends Controller
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
        $managers = User::where('service_id','>=',3)->paginate(10);
        return view('admin.service.listmanager')
            ->with('managers',$managers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::orderBy('created_at','desc')->get();
        return view('admin.service.createmanager')->with('servicelist',$service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {  
        $getphone = Service::all()->where('id',$request->service)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $getphone->bank_account;        
        $user->service_id = $request->service;      
        $user->image = 'noImage.jpg';
        $user->password = Hash::make($request->pass);
        $user->save();
        $detail = [
            'username' => $user->name,
            'password' => $user->password
        ];
 
        $message = [
            'username' => $user->name,
            'password' => $request->pass,
            'email' => $user->email
        ];

        $user = User::all()->where('email',$request->email)->first();
        $bank = new Bank();
        $bank->user_id = $user->id;
        $bank->balance = 0 ;
        $bank->save();

        //event(new NewManagerHasRegisteredEvent($message));
        //Mail::to($user->email)->send(new WelcomeMail($detail));
        
        return redirect()->route('admin.manager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = User::find($id);
        return view('admin.service.showmanager')
            ->with('managers',$manager);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manager = User::find($id);
        $service = Service::all(); 
        return view('admin.service.editmanager')
            ->with('managers',$manager)
            ->with('service',$service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;        
        $user->service_id = $request->service;
        $user->password = $request->pass;
        $user->save();
        return redirect()->route('admin.manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
