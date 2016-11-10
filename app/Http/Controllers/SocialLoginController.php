<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = $this->findOrCreateFacebookUser(
            Socialite::driver('facebook')->user()
        );

        auth()->login($user);

        return redirect('/');
    }


    public function findOrCreateFacebookUser($facebookUser) 
    {
        $user = User::firstOrNew(['facebook_id' => $facebookUser->id]);

        if ($user->exists) {
            return $user;
        }

        $user->fill([
            'username' => $facebookUser->id,
            'name' => $facebookUser->name,
            'email'=> $facebookUser->email
        ])->save();

        return $user;
    }
}
