<?php

namespace App\Http\Controllers;

use App\UserRegis;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class UserRegisController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    // Fetch records
	public function getUsers()
	{
		// Call getuserData() method of UserRegis Model
		$userData['data'] = UserRegis::getuserData();

		echo json_encode($userData);
		exit;
	}

    // Insert record
	public function addUser(Request $request)
	{
		$name = $request->input('name');
		$email = $request->input('email');

		if($name !='' && $email != '')
		{
			$data = array('name'=>$name,"email"=>$email);

			// Call insertData() method of UserRegis Model
			$value = UserRegis::insertData($data);
			if($value)
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

	// Update record
	public function updateUser(Request $request)
	{
		// dd($request);
		$name = $request->input('name');
		$email = $request->input('email');

		if($name !='' && $email != '')
		{
			$data = array('name'=>$name,"email"=>$email);
			// Call editUserData() method of UserRegis Model
			$value = UserRegis::editUserData($data);
			if($value)
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

	// Delete record
	public function deleteUser(Request $request)
	{		
		$del_id = $request->input('del_id');

		if($del_id !='')
		{
			$data = array('id'=>$del_id); 
			// Call deleteData() method of UserRegis Model
			$value = DB::table('users')->where('id', $data['id'])->delete();
			if($value)
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
	/*public function deleteUser($id=0)
	{
		// Call deleteData() method of UserRegis Model
		UserRegis::deleteData($id);

		echo "Delete successfully";
		exit;
	}*/
}
