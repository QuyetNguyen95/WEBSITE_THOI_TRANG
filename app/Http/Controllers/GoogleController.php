<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller
{
    public function redirectProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        return $user->token;
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return redirect()->route('home')->with('Đăng nhập thành công');
    }

    private function findOrCreateUser($user)
    {
        $authUser = User::where('social_id',$user->id)->first();
        if($authUser)
        {
            return $authUser;
        }
        else
        {
           return User::create([
                    'name'   => $user->name,
                    'email'  => $user->email,
                    'password' => ' ',
                    'avatar' => $user->avatar
                ]);
        }
    }
}
