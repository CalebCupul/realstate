<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    //

    /**
     * @param $driver
     */
    public function redirectToProvider($driver)
    {
        try {

            return Socialite::driver($driver)->redirect();

        } catch (\Exception $e) {

            return redirect('login');

        }

    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $driver)
    {

        if ($request->has('error')) {
            return redirect('login')->withErrors('Acceso denegado');
        }

        $socialite_user = Socialite::driver($driver)->user();

        $social_profile = SocialProfile::Query()
            ->where('social_id', $socialite_user->getId())
            ->where('social_name', $driver)
            ->first();

        if (!$social_profile) {
            $user = User::where('email', $socialite_user->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name'     => $socialite_user->getName(),
                    'email'    => $socialite_user->getEmail(),
                    'password' => bcrypt(Str::random(16)),
                ]);
            }

            $social_profile = SocialProfile::updateOrCreate(
                ['social_id' => $socialite_user->getId(), 'social_name' => $driver],
                ['social_avatar' => $socialite_user->getAvatar(), 'user_id' => $user->id]
            );

        }
        Auth::login($social_profile->user);

        return redirect('home');

    }
}
