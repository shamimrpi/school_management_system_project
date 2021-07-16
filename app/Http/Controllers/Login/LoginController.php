<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //

    public function logout(Request $request)
    {
    	Auth::logout();

	    $request->session()->invalidate();

	    $request->session()->regenerateToken();

    	return redirect()->to('/login');
    }
}
