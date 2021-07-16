<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
	public function index()
	{
		$users = User::all();
		return view('users.index',compact('users'));
	}
	public function create()
	{
		return view('users.create');
	}
	public function store(Request $request)
	{
		$this->validate($request,[
			'name' => 'required',
			'email' => 'required|unique:users',
			'role' => 'required',
			'mobile' => 'required|unique:users|max:13'
		]);
		$code = rand(0000,9999);

		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->role = $request->role;
		$user->mobile = $request->mobile;
		$user->code = $code;
		$user->password = Hash::make($code);
		$user->save();

		flash('User update successfully')->success();
        return redirect()->route('users');

	}
    public function edit($id)
    {
    	$user = User::findOrfail($id);
    	return view('users.edit',compact('user'));
    }
    public function update(Request $request,$id)
    {
    	

    	$code = rand(0000,9999);

    	$password = Hash::make($code);

    	$user = User::findOrfail($id);
    	$user->update([
    		'name' => $request->name,
	    	'email' => $request->email,
	    	'role' => $request->role,
	    	'mobile' => $request->mobile,
	    	'password' => $password,
	    	'code' => $code
    	]);
    	
    	
    	flash('User update successfully')->success();
        return redirect()->route('users');
    }
}
