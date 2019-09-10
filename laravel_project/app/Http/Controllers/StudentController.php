<?php

namespace App\Http\Controllers;

use App\Student;
use App\document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // For Data show

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
        //$studentsName = DB::table('students')->get();
        //$studentsName = DB::table('students')->orderBy('id')->paginate(2);
        //return view('index', ['studentsName' => $studentsName]);
        //return view('index', compact('studentsName'));

        /*$studentsName = DB::table('orders')
              ->where('status', 'Shipped')
              ->orderBy('orderNumber', 'desc')
              ->paginate(4);
        return view('index', ['studentsName' => $studentsName]);*/

        $studentsName = DB::table('students')->orderBy('registration_id')->paginate(4);
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
        // Check validation
        $this->validate($request, [
            'student_name'      => 'required|string|max:10',
            'registration_id'   => 'required|integer|unique:students', // unique:table Name
            'department_name'   => 'required|string',
            'info'              => 'nullable',
        ]);

        /*$user = User::where('email',Input::get('email'))->first();
        if (is_null($user)) {
           print_r("email is exists");
        }
           print_r("email is not exists");*/

        //dd('Submited');
        $studentObj = new student;
        $studentObj->name               = $request->student_name;
        $studentObj->registration_id    = $request->registration_id;
        $studentObj->department_name    = $request->department_name;
        $studentObj->info               = $request->info;
        $studentObj->save();

        return redirect()->route('index')->with('success', 'Data Successfully Save');
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
        $sId = DB::table('students')
        ->where('id', $id)
        ->update(['name' => $request->student_name, 'department_name' => $request->department_name, 'info' => $request->info]);

        /* // update technic 2
        $studentId = Student::find($id);        
        $studentId->name               = $request->student_name;
        $studentId->registration_id    = $request->registration_id;
        $studentId->department_name    = $request->department_name;
        $studentId->info               = $request->info;
        $studentId->save();*/

        return redirect()->route('index')->with('updateSuccess', 'Data Successfully Updated');
    }

    public function delete($id)
    {
        $studentId = Student::find($id);
        $studentId->delete();

        return redirect()->route('index')->with('deleteSuccess', 'Data Successfully Deleted');
    }

    public function uploadPage()
    {
        return view('file');
    }

    public function saveFile(Request $request)
    {
        $this->validate($request, [
            'imgUpload1'  => 'required'
        ]);

        $image = $request->file('imgUpload1');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images'), $new_name);
        return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);

       /*request()->validate([
         'imgUpload1'  => 'required|mimes:doc,docx,pdf,txt',
       ]);
       $files = $request->file('fileUpload');
       dd($files);
 
       if ($files = $request->file('imgUpload1')) {
           $destinationPath = 'public/file/'; // upload path
           $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profilefile);
           dd($profilefile);
           $insert['file'] = "$profilefile";
        }
         
        $check = document::insertGetId($insert);
 
        return Redirect::to("file")
        ->withSuccess('Great! file has been successfully uploaded.');*/
 
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
