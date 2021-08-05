<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student_class;

class LoginController extends Controller
{
    //

    public function login(){
    	return view('login.login');
    }
    public function authenticate(Request $request)
    {
    	
        $data = $request->only('email', 'password');

    	
    	/* $data['password'] = Hash::make($data['password']);*/
    	if (Auth::attempt($data)) {
    		return redirect()->to('/dashboard');
    	} else {
    		return redirect()->route('login')->withErrors(['Invalid Email and password']);
    	}
    }

    public function logout(Request $request)
    {
    	Auth::logout();

    	return redirect()->to('/');
    }

    public function dashboard()
    {
        $classes = Student_class::all()->count();
        $users = User::all()->count();
        $employees = User::where('usertype','employee')->count();
        $students = User::where('usertype','student')->count();

        
    	return view('dashboard',compact('classes','users','employees','students'));
    }
}
