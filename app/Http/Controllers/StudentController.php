<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendance;
use Auth;

class StudentController extends Controller
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
    public function index()
    {
        $students = Student::orderBy('id','desc')->get();
        $totalDays = Attendance::distinct()->count('date');
        return view('student.index', compact('students','totalDays'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('student.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students',
            'address' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $data = new Student();
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->image = $request->image;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->status = $request->status;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().$file->getClientOriginalName();
            $file-> move(public_path('/image/student'), $filename);
            $data->image= $filename;
        }
        $data->save();
        return redirect()->route('students.index')->with('success','Student has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Student $student)
    {
        return view('student.show',compact('student'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit',compact('student'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ]);
        
        $data = Student::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->status = $request->status;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().$file->getClientOriginalName();
            $file-> move(public_path('/image/student'), $filename);
            $data->image= $filename;
        }
        $data->save();

        return redirect()->route('students.index')->with('success','Student Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $student = Student::find($id);
        $attendance = Attendance::where('student_id',$student->id)->first();
        if ($attendance) {
        return redirect()->route('students.index')->with('success','This student can not be delete.');
            
        }else{
        $student->delete();
        return redirect()->route('students.index')->with('success','Student has been deleted successfully');
        }
    }

    public function attendanceDetail($slug)
    {
        $student = Student::where('slug',$slug)->first();
        $attendances = Attendance::where('student_id',$student->id)->get();
        $totalDays = Attendance::distinct()->count('date');
        return view('student.attendance',compact('student','attendances','totalDays'));
    }
}

