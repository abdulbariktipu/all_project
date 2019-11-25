<?php
 // php artisan make:controller SendMailController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Added
use App\Mail\ContractFormMail; // Added
use App\Http\Requests\Contact_Mail; // Added

class SendMailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contact()
    {
        return view('emails.contact_mail');

    }

    public function send_mail(Contact_Mail $req)
    {
        $data = ['name'=>$req->name,
                'email'=>$req->email,
                'message'=>$req->message
            ];
            //dd($data);

        Mail::to('testmymail@gmail.com')->send(new ContractFormMail($data));
        return view('emails.contact_mail');
    }
}
