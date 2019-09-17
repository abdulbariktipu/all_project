<?php

namespace App\Http\Controllers;

use App\userReg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

use Validator;
use Auth;

class UserRegController extends Controller
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
            return redirect('homePage');
        }
        else
        {
            return back()->with('errorMessage', 'Wrong Login Details');
        }
    }

    public function homePage()
    {
        return view('homePage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userPage()
    {        
        return view('user_registration');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveUser(Request $request)
    {
        $userName = $request->input('userName');
        $email = $request->input('email');
        $userPassword = $request->input('userPassword');
        $hashPass = Hash::make($userPassword);
        $rememberToken = str_random(10);
        //dd($request);
        $this->validate($request, [
          'userName'   => 'required',
          'email'   => 'required|email|unique:users,email',
          'userPassword'  => 'required|alphaNum|min:3'
         ]);

        if($userName !='' && $email != '' && $userPassword != '')
        {
            $data = array('name' => $userName, 'email' => $email, 'password' => $hashPass, 'remember_token' => $rememberToken);
            $value = userReg::insertData($data);
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
     * Display the specified resource.
     *
     * @param  \App\userReg  $userReg
     * @return \Illuminate\Http\Response
     */
    public function show(userReg $userReg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userReg  $userReg
     * @return \Illuminate\Http\Response
     */
    public function edit(userReg $userReg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userReg  $userReg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userReg $userReg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userReg  $userReg
     * @return \Illuminate\Http\Response
     */
    public function destroy(userReg $userReg)
    {
        //
    }

    function logout()
    {
        Auth::logout();
        return redirect('/'); // redirect login.blade.php page
    }
}
