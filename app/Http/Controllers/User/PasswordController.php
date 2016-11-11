<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PasswordRequest;
use App\User;
use Auth;

/**
 * Password management for current logged user
 *
 * @author Yugo <dedy.yugo.purwanto@gmail.com>
 * @copyright Simple Forum - 2016
 */
class PasswordController extends Controller
{
    /**
     * Show password form
     *
     * @return \Illuminate\Http\Response
     */
    public function change()
    {
        return view('users.passwords.change');
    }

    /**
     * @param ValidationRequest $request
     * @return Redirect
     */
    public function update(PasswordRequest $request)
    {
        $user = Auth::user();

        $user->password = bcrypt($request->password);

        if ($user->save() === true) {
            return redirect(url()->current())
                ->withSuccess(trans('user.message.passwordUPdated'));
        }

        return redirect()->back();
    }
}
