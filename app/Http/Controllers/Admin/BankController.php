<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Register;
use App\Service;
use App\MobileBank;

class BankController extends Controller
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
        $arr['banking'] = MobileBank::paginate(4);
        return view('admin.bank.listbank')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MobileBank $bank)
    {
        if ($request->hasFile('bankphoto')) {
            // Get filename with the extendsion
            $filenameWithExt = $request->file('bankphoto')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get Just Extenstion
            $extension = $request->file('bankphoto')->getClientOriginalExtension();

            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Upload to database
            $path = $request->file('bankphoto')->storeAs('public/logo', $filenameToStore);
        }
        else
        {
            $filenameToStore='noImage.jpg';
        }
        
        $bank->id= $request->bankid;
        $bank->bank_name = $request->bankname;
        $bank->http = $request->bankhttp;
        $bank->image = $filenameToStore;
        $bank->save();
        return redirect()->route('admin.bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MobileBank $bank)
    {
        $banklist = MobileBank::orderBy('bank_name')->get();
        $whichservice = Service::all()->where('mobile_bank_id',$bank->id);
        return view('admin.bank.show')->with('bankinfo',$bank)
             ->with('banklist',$banklist)
             ->with('whichservice',$whichservice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr['bankinfo'] = MobileBank::all()->
                            where('id',$id);
        return view('admin.bank.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileBank $bank)
    {
        $bank->id= $request->id;
        $bank->bank_name = $request->name;
        $bank->http = $request->http;
        $bank->save();
        return redirect()->route('admin.bank.index');
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
