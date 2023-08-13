<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request)
	{
		$data = $request -> validate([
			'email' => 'required',
			'password' => 'required'	
		]);
		if (Auth::attempt($data))
		{	
			$request->session()->regenerate();
			return redirect()->intended('/dashboard-admin');
			$request->session()->flash('LoginSucces','Login berhasil');
		}
		return back()->with('ErorLogin','Login failed!');
	}

    public function logout(Request $request)
	{	
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('login');
	}
}
