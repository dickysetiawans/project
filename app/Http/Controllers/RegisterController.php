<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validateData = $request -> validate([
			'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
			
		]);
       if($validateData['password'] != $validateData['password_confirmation']){
        return back()->with('ErorLogin','Password tidak sama');
       }
 
        $adminCount = User::where('roles_id', 1)->count();

        // Tentukan peran pengguna baru
        $role = ($adminCount === 0) ? 1 : 2;

        User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'roles_id' => $role,
        ]);

        return redirect()->route('login');
        
    }
    
   
}
