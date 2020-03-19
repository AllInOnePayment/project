<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class TestsController extends Controller
{
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
}
