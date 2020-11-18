<?php

namespace App\Http\Controllers\Admin;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\MobileBank;
use App\Events\NewManagerHasRegisteredEvent;

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
        $service = Service::orderBy('service_name')->get();
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;        
        $user->service_id = $request->service;
        $user->password = $request->pass;
        $user->save();
        $detail = [
            'username' => $user->name,
            'password' => $user->password
        ];

        //event(new NewManagerHasRegisteredEvent($user));

        Mail::to($user->email)->send(new WelcomeMail($detail));
        
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
