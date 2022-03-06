<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Session;
use Exception;

class AuthController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $dbUser = User::where('google_id', $user->id)->first();
            if ($dbUser) {
                // existing user - login
                // Auth::login($dbUser);
                // $request->session()->put('login_id', $dbUser->user_id);
                
                if ($dbUser->company_id) {
                    return redirect('/company/dashboard');
                } else if ($dbUser->candidate_id) {
                    return redirect('/candidate/dashboard');
                } else {
                    return redirect('/register');
                }
            } else {
                // new user - register
                $newUser = new User();
                $newUser->google_id = $user->id;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->photo_url = $user->avatar;
                $newUser->save();

                // Auth::login($newUser);
                // return redirect('/')->with('name', $newUser->name);
                // $request->session()->put('login_id', $newUser->user_id);
                return redirect('/register');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
