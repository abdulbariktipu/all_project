<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class userReg extends Model
{
     public static function insertData($data)
     {
     	// dd($data);
        $value=DB::table('users')->where('email', $data['email'])->get();
		if($value->count() == 0)
		{
			$insertid = DB::table('users')->insertGetId($data);
			return $insertid;
		}
		else
		{
			return 0;
		}
     }
}
