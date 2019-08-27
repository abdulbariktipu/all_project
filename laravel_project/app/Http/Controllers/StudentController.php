<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // Data show
    {
       //return view('index');
        $studentsName = DB::table('students')->get();
        return view('index', ['studentsName' => $studentsName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Data insert into student table
    {
        // dd('Submited'); // dd is a like die();

        $studentObj = new student;
        $studentObj->name               = $request->name;
        $studentObj->registration_id    = $request->registration_id;
        $studentObj->department_name    = $request->department_name;
        $studentObj->info               = $request->info;
        $studentObj->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // Data Update into student table
    {
        $studentId = Student::find($id); // eloquent, Retrive a model by its primary key 
        //dd($studentId);
        return view('edit')->with('studentId', $studentId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $studentId = Student::find($id);
        
        $studentId->name               = $request->name;
        $studentId->registration_id    = $request->registration_id;
        $studentId->department_name    = $request->department_name;
        $studentId->info               = $request->info;
        $studentId->save();

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
