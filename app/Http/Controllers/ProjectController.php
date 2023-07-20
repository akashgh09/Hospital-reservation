<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Appoinment;
use App\Models\Booking;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\Auth;

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
       return view('appoinments',['appoinments'=>$appoinments]);
    }
    
    public function getView()
    {
        return view('welcome');
    }
    public function bookAppoinment(Request $requenst){
        $appoinment_id=$requenst->input('appoinment_id');
        $department_name=$requenst->input('department_name');
        $appoinment_date=$requenst->input('appoinment_date');
        $exists= Booking::where('appoinment_id','=',$appoinment_id)->exists();
        if($exists)
        {
              Session::flash('message','Appointment was already taken');
              Session::flash('alert-class','alert-danger');
              return redirect('/');
        }
        else
        {
                 $booking = new Booking;
                 $booking->appoinment_id=$appoinment_id;
                 $booking->department_name=$department_name;
                 $booking->appoinment_date=$appoinment_date;
                 $booking->username=Auth::user()->name;
                 $booking->user_id=Auth::user()->id;
                 $booking->save();

                 Session::flash('message','Appointment was booked successfully');
                 Session::flash('alert-class','alert-sucess');
                 return redirect('/');

        }
        

    }
}
