<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRegis extends Model
{
	// Fetch records
    /*public static function getuserData($id=null)
    {
		$value=DB::table('users')->orderBy('id', 'asc')->get(); 
		return $value;
	}*/

   // Add record
   public static function insertData($data)
   {
     $value=DB::table('users')->where('name', $data['name'])->get();
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

   // Update record
	/*public static function updateData($id,$data)
	{
		DB::table('users')->where('id', $id)->update($data);
	}

	// Delete record
	public static function deleteData($id=0)
	{
		DB::table('users')->where('id', '=', $id)->delete();
	}*/
}
