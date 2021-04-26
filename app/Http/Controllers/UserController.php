<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use  Illuminate\Session\Middleware\StartSession;

class UserController extends Controller
{
    function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        if ($user || Hash::check($request->password, $user->$user->password)) {
            $request->session()->put('user', $user);
            return redirect('/');
        } else {
            return "username or password is not matched";
        }
    }
}
