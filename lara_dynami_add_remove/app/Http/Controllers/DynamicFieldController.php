<?php

namespace App\Http\Controllers;

use App\DynamicField;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Carbon;

class DynamicFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('dynamic-field');
        return view('dynamic_field');
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
    public function insert(Request $request)
    {
        $rules = array(
            'first_name.*'  => 'required',
            'last_name.*'  => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
        }

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        for ($count=0; $count < count($first_name); $count++) 
        {
            $data = array(
                'first_name' => $first_name[$count],
                'last_name'  => $last_name[$count],
                'created_at' => Carbon::now()
               );
            $insert_data[] = $data; 
        }
        //dd($insert_data);
        DynamicField::insert($insert_data);
        return response()->json([
           'success'  => 'Data Added successfully.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DynamicField  $dynamicField
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicField $dynamicField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DynamicField  $dynamicField
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicField $dynamicField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DynamicField  $dynamicField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DynamicField $dynamicField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DynamicField  $dynamicField
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicField $dynamicField)
    {
        //
    }
}
