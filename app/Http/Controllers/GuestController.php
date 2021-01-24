<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\MobileBank;

class GuestController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {

    	return view('welcome');
    }
}
