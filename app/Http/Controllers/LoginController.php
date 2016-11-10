<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest', ['except' => 'logout']);
	}

    public function showForm()		
    {
    	return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'password' => 'required'
        ]);

        if ($this->signIn($request)) {
            return redirect('/');
        }

        return back();
    }

    /**
     * Attempt to sign in the user using username or email.
     *
     * @param Request $request
     * @return bool
     */
    private function signIn(Request $request)
    {
        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return \Auth::attempt($this->getCredentials($request, $field), true);
    }

    /**
     * Get the login credentials and requirements.
     *
     * @param Request $request
     * @return array
     */
    private function getCredentials(Request $request, $field)
    {
        return [
            $field => $request->login,
            'password' => $request->password
        ];
    }

    public function logout()
    {
    	\Auth::logout();

    	return redirect('/');
    }
}
