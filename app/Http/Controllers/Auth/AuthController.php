<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:100',
			'role_id' => 'required|integer',
			'status' => 'required|string|max:1',
			'first_name' => 'string|max:100',
			'last_name' => 'string|max:100',
			'tel' => 'string|max:20',
			'email' => 'string|email|max:100',
			'address' => 'string|max:255'
        ]);

        if($validator->fails()){
			return redirect()->back()->with('error', 'Validation Failed.');
		}
		//default password for the user: 
		$default_password = "Password";
		$default_user = 1;
		$status = "A";
        $default_login_at = 0000-00-00;

        $user = User::create([
            'user_id' => $request->username,
            'password' => Hash::make($default_password),
			'status' => $request->$status,
			'role_id' => $request->role_id,
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'tel' => $request->tel,
			'email' => $request->email,
			'address' => $request->address,
            'login_at' => $default_login_at,
			'created_by' => $default_user
        ]);
		
		if(!$user){			
			return redirect()->back()->with('error', 'User not Created.');			
		}

		return redirect()->route('user.index')->with('success', 'User successfully saved.');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string|max:100',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput(); 
        }

        $user = User::where('user_id', $request->user_id)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
			
			return redirect()->back()->with('error', 'Invalid Credentials.'); 
        }
		
		if($user->status != 'A'){
			return redirect()->back()->with('error', 'User is Inactive.'); 		
		}

        return redirect()->route('dashboard')->with('success', 'Login Successfully.');
    }
}
