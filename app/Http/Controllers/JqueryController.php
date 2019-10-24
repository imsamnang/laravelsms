<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User; 

class JqueryController extends Controller
{
   public function jquery()
   {
   		return view('jquery.jquery',['roles'=>Role::pluck('name','id')]);
   }

   public function postJquery(Request $r)
   {
	   	if($r->ajax())
	   	{
	   		$user = new User();
	   		// $user['name'] = $user->name;
	   		$user = array(
	   					'name' => $r->name,
	   					'username' => $r->name,
	   					'email' => $r->email,
	   					'password' => $r->password,
	   					'active' => 1,
	   					'role_id' => $r->role_id,
	   					);
	   		if($user->save())
	   		{
	   			return response(['msg'=>'Inserted Successfully']);
	   		}
	   			// return response($user);
	   	}
   }
}
