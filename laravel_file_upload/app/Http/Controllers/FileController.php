<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    public function create()
    {
        //
        return view('create');
    }

    public function store(Request $request) 
    {
 
        $this->validate($request, [ 
            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip,txt,jpg,png' 
        ]);
 
        if($request->hasfile('filename'))
        { 
            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
           	}
        }
 
         $file= new File();
         $file->filename=json_encode($data);          
         
        $file->save();
 
        return back()->with('success', 'Your files has been successfully added');
    }
}
