<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Models\Address;
use  Illuminate\Session\Middleware\StartSession;
use phpDocumentor\Reflection\PseudoTypes\True_;

class UserController extends Controller
{

    function showLogin(Request $req)
    {
        return view('login', ['error', False]);
    }

    function login(Request $req)
    {
        $user = User::where(['email' => $req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return view('login', ['error' => True]);
        } else {
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }

    function logout(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->forget('user');
        }
        return view('login', ['error' => False]);
    }

    function showRegister(Request $req)
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

    function showAddress(Request $req)
    {
        $userId =  $req->session()->get('user')['id'];
        $addresses = Address::where('user_id', $userId)->get();
        return view('address', ['addresses' => $addresses]);
    }
    function addAddress(Request $req)
    {
        $userId =  $req->session()->get('user')['id'];
        $address = new Address();
        $address->user_id = $userId;
        $address->address = $req->address;
        $address->name = $req->name;
        $address->city = $req->city;
        $address->region = $req->region;
        $address->zip = $req->zip;
        $address->country = $req->country;
        $address->save();
        return redirect('address');
    }
}
