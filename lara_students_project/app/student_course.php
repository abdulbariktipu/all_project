<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class student_course extends Model
{
	public static function insertData($data)
	{
		//dd($data);
		$value=DB::table('student_courses')->where('course_code', $data['course_code'])->get();
		if($value->count() == 0)
		{
			$insertid = DB::table('student_courses')->insertGetId($data);
			return $insertid;
		}
		else
		{
			return 0;
		}
	}

	public static function updateData($updateData)
	{
		$value=DB::table('student_courses')->where('id', $updateData['id'])->update($updateData);
		if($value != 0)
		{
			return 2;
		}
		else
		{
			return 0;
		}
	}

	public static function getCourseData($id=null)
    {
		$value=DB::table('student_courses')->orderBy('id', 'asc')->get(); //->paginate(4) 
		return $value;
	}
}
