<?php

namespace App\Http\Controllers;

use App\userReg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userPage(Request $request)
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
        dd($request);
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
}
