<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Session;

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
                Session::put('user', $dbUser);
                if ($dbUser->company_id) {
                    return redirect(route('company.dashboard'));
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
                Session::put('user', $newUser);
                return redirect('/register');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logout()
    {
        Session::remove('user');
        return redirect('/');
    }
}
