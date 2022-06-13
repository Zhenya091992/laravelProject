<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{
    public function signin(Request $request)
    {
        $checkPassword = new CurrentPassword;
        $checkPassword->setData($request->only('email'));

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', $checkPassword]
        ]);

        $user = User::where('email', $request->only('email'))->first();

        return redirect('/account/' . $user->name);
    }

    public function exit()
    {
        Auth::logout();

        return redirect('/');
    }

}
