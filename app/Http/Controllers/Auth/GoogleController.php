<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Exception;
use Socialite;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();


            if ($finduser) {

                Auth::login($finduser);

                return redirect('/marketplace');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('admin')
                ]);
                Auth::login($newUser);

                return redirect('/marketplace');
            }
        } catch (Exception $e) {
            Log::info(json_encode($e));
            return redirect('/login');
        }
    }
}
