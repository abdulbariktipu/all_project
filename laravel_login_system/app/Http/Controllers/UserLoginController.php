<?php

namespace App\Http\Controllers;

use App\userLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login_page');
    }

    public function checklogin(Request $request)
    {
        $userEmail = $request->input('user_email');
        $userPassword = $request->input('user_password');
        
        $this->validate($request, [
          'user_email'   => 'required|email',
          'user_password'  => 'required|alphaNum|min:3'
         ]);
        //dd($userEmail);

        $user_data = array(
          'email'  => $request->get('user_email'),
          'password' => $request->get('user_password')
         );
        // dd($user_data);
        if(Auth::attempt($user_data))
        {
            // dd('test');
            return redirect('login/successlogin');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function successlogin()
    {
        return view('successlogin');
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\userLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function show(userLogin $userLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(userLogin $userLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userLogin $userLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userLogin  $userLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(userLogin $userLogin)
    {
        //
    }
}
