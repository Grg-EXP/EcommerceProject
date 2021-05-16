<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use  Illuminate\Session\Middleware\StartSession;

class UserController extends Controller
{
    function login(Request $req)
    {

        $user = User::where(['email' => $req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return "Username or password is not matched";
        } else {
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }
    function register(Request $req)
    {

        return view('register');
    }
    function addNewUser(Request $req)
    {
        $user_count = User::where(['email' => $req->email])->count();
        if ($user_count == 0 && $req->password == $req->confirm_password) {
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->save();
            $req->session()->put('user', $user);
            return redirect('/');
        } else return "password errata o email gia esistente";
    }
}
