<?php

namespace App\Http\Controllers;

use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\Mail; // Added
use App\Mail\ContractFormMail; // Added
use App\Http\Requests\Contact_Mail; // Added

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact_mail');

    }

    public function send_mail(Contact_Mail $req)
    {
        $data = ['name'=>$req->name,
                'email'=>$req->email,
                'message'=>$req->message
            ];
            //dd($data);

        Mail::to('testmymail@gmail.com')->send(new ContractFormMail($data));
        return view('contact_mail');
    }
}
