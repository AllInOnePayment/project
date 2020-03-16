<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\RegisterService;
use App\ServiceList;

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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=0;
        $arr['listuser'] = User::all()->where('service_id',$id);
        return view('admin.user.listuser')->with($arr);
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
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if ($request->photo->getClientOriginalName()) {

            $ext = $request->photo->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,9999).'.'.$ext;
            $request->photo->storeAs('public/avator',$file);
        }
        else
        {
            $file='';
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$arr2['detail'] = User->RegisterService->ServiceList::all();
        $arr['user'] = User::find($id);
        //$arr->service = $serviceName;
        return view('admin.user.userdetail')->with($arr);
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
        return view('admin.user.edit')->with($arr); 
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
