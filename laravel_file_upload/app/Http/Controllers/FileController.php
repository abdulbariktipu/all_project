<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\DB;
use Validator;
class FileController extends Controller
{
    public function create()
    {
        //
        return view('create');
    }

    public function storeImg(Request $request) 
    {
 
        $this->validate($request, [ 
            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip,txt,jpg,png' 
        ]);
        
        $caption = $request->input('imgCaption');
        $image = $request->file('filename');

        if($request->hasfile('filename'))
        { 
            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name); 
                $data[] = $name;   
                //$imgdata = array($caption[0],$name);  
           	}
        }
        //dd($imgdata);
        $dataObj= new File();
        $dataObj->filename=json_encode($data);
        $dataObj->img_caption=json_encode($caption);
         
        $dataObj->save();
 
        return back()->with('success', 'Your files has been successfully added');
    }
}
