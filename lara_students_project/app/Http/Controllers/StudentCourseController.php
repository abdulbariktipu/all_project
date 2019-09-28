<?php

namespace App\Http\Controllers;

use App\student_course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Validator;
use Auth;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function course()
    {
        return view('course_create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveCourse(Request $request)
    {
        // dd($request);

        $courseCode = $request->input('courseCode');
        $courseName = $request->input('courseName');
        $credit = $request->input('credit');
        $writerName = $request->input('writerName');
        $edition = $request->input('edition');
        
        /*$this->validate($request, [
          'userName'   => 'required',
          'email'   => 'required|email|unique:users,email',
          'userPassword'  => 'required|alphaNum|min:3'
         ]);*/

        $rules = array(
            'courseCode'  => 'required|unique:student_courses,course_code',
            'courseName'  => 'required',
            'credit'  => 'required|numeric',
            'writerName'  => 'required',
            'edition'  => 'required'
        );

        $input = $request->all();
        $customMessages = [
            'writerName.required' => 'The writer name cant empty.',
        ];

        $error = Validator::make($input, $rules, $customMessages);

        //$error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
        }

        if($courseCode !='' && $courseName != '' && $credit != '')
        {
            $data = array('course_code' => $courseCode, 'course_name' => $courseName, 'credit' => $credit, 'writer' => $writerName, 'edition' => $edition, 'created_at' => Carbon::now());
            $value = student_course::insertData($data);
            // $value = DB::table('users')->insertGetId($data);
            if ($value) 
            {
               echo $value;
            } 
            else 
            {
               echo 0;
            }            
        }
        else
        {
           echo 'Fill all fields.';
        }

        exit; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /*public function getUsers()
    {
        // Call getuserData() method of UserRegis Model
        $userData['data'] = UserRegis::getuserData();

        echo json_encode($userData);
        exit;
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\student_course  $student_course
     * @return \Illuminate\Http\Response
     */
    public function getCourse(student_course $student_course)
    {
        /*$studentsName = DB::table('students')->orderBy('registration_id')->paginate(4);
        return view('index', ['studentsName' => $studentsName]);*/
        $userData['data'] = student_course::getCourseData();
        echo json_encode($userData);
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student_course  $student_course
     * @return \Illuminate\Http\Response
     */
    public function edit(student_course $student_course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student_course  $student_course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student_course $student_course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student_course  $student_course
     * @return \Illuminate\Http\Response
     */
    public function destroy(student_course $student_course)
    {
        //
    }
}
