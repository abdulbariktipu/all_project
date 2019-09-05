<?php

namespace App\Http\Controllers;

use App\homePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ //SELECT * FROM `orders` WHERE `customerNumber` IN (SELECT `customerNumber` FROM `customers`)
    public function index(){
         $studentsInfo = DB::table('orders')
                ->select('*')
                ->whereIn('customerNumber',function($query){
                    $query->select('customerNumber')->from('customers');
                })                
                ->groupBy('customerNumber')
                ->get();
         return view('homePage', ['studentsInfo' => $studentsInfo]);
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
     * @param  \App\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(homePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(homePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\homePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(homePage $homePage)
    {
        //
    }
}
