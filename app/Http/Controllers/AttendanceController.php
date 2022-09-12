<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use Auth;

class AttendanceController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function attendancePost(Request $request)
    {
        $students = Student::get();
        $now = date('Y-m-d');
        foreach ($students as $key => $student) {
            $attendance = Attendance::where('student_id',$student->id)->where('date',$now)->first();
            if(!$attendance){
            $data = new Attendance();
            $data->date = $now;
            $data->student_id = $student->id;
            $data->status = null;
            $data->save();
            }
        }
        return redirect()->route('attendance.index');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $now = date('Y-m-d');
        $todayAttendance = Attendance::where('date',$now)->get();
        return view('attendance.index',compact('todayAttendance','now'));
    }

    public function list()
    {
        $attendances = Attendance::get();
        return view('attendance.list',compact('attendances'));
    }

    public function attendanceFinalPost(Request $request)
    {
        foreach($request->attendance_id as $key=>$attendanceId)
        {
            $attendance = Attendance::find($attendanceId);
            $attendance->status = $request->status[$key];
            $attendance->save();
        }
        return redirect()->route('home');
    }
}

