<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Appoinment;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getAllDepartments(Request $request)
    {
        $departments = Department::All();
        return view('index', ['departments'=>$departments]);
    }
    public function showAppoinments(Request $request)
    {
       $department_id= $request->input('department_id');
       $appoinments= Appoinment::where('department_id',$department_id)->get();
       return \view('appoinments',['appoinments'=>$appoinments]);
    }
    
    public function getView()
    {
        return view('welcome');
    }
}
