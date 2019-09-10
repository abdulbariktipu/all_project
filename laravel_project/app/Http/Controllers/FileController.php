<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function myFunction()
    {
        return view('file_upload_page');
    }
 
    public function save()
    {
       request()->validate([
         'file'  => 'required|mimes:doc,docx,pdf,txt|max:2048',
       ]);
 
       if ($files = $request->file('fileUpload')) {
           $destinationPath = 'public/file/'; // upload path
           $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profilefile);
           $insert['file'] = "$profilefile";
        }
         
        $check = Document::insertGetId($insert);
 
        return Redirect::to("file")
        ->withSuccess('Great! file has been successfully uploaded.');
}
