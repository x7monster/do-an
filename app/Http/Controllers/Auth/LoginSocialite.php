<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Str;

class LoginSocialite extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->stateless()->user();

        $user = $this->findOrCreate($getInfo, $provider);

        auth()->login($user);

        if ($user->usertype == 'Admin') {
            return redirect()->route('login');
        } else {
            return redirect()->route('index');
        }
    }

    public function findOrCreate($info, $provider)
    {
        $user = User::where('provider_id', $info->id)->first();

        if (!$user) {
            $user = User::create([
                'username' => $info->email,
                'name' => $info->name,
                'email' => $info->email,
                'provider_name' => $provider,
                'provider_id' => $info->id,
                'password' => Hash::make(Str::random(10)),
                'usertype' => 'customer',
                'role' => 'User',
            ]);
        }

        return $user;
    }
}
