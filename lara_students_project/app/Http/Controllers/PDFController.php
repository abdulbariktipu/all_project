<?php
// https://www.siddharthshukla.in/blog/laravel-6-generate-pdf-file/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // added
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PDFController extends Controller
{
    public function PDFgenerator()
    {
        $userList = DB::table('users')->select('id','name','user_type','email','created_at')->orderBy('id')->get();
       // return view('pdfGenerator', ['userList' => $userList]);
    	$pdf = PDF::loadview('pdfGenerator', ['userList' => $userList])->setPaper('A4', 'landscape'); // page name
    	return $pdf->download('pdfFileName.pdf');
    }
}
