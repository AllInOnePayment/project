<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\SchoolInfo;

class SchoolInfoController extends Controller
{
    public function index($name)
    {
    	$school = Service::all()->where('service_name',$name)->first();
    	return view('admin.school.index')->with('school',$school);
    }

    public function store(Request $request, SchoolInfo $school )
    {
	 	$school->service_id = $request->id;
	 	$school->grade_max  = $request->grade;
	 	$school->class_max  = $request->sclass;
	 	$school->address    = $request->address;
	 	$school->save();

        return redirect()->route('admin.manager.create');

    }
}
