<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showForm()
    {
    	return view('auth.register');
    }

    public function register(Request $request)
    {
    	$this->validate($request,[
    		'username' => 'required|unique:users,username|max:15|alpha_dash',
    		'name' => 'required',
    		'email' => 'required|unique:users,email|email', 
    		'password' => 'required|confirmed'
		]);

		$user = User::register($request->all());

		auth()->login($user);

		return redirect('/');
    }
}
