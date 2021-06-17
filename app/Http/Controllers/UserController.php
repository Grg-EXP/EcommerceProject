<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Models\Address;
use  Illuminate\Session\Middleware\StartSession;
use phpDocumentor\Reflection\PseudoTypes\True_;

class UserController extends Controller
{

    function showLogin(Request $req)
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return view('login');
    }

    function login(Request $req)
    {
        //view login
        $req->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        //

        $user = User::where(['email' => $req->email])->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            return view('login', ['error' => True]);
        } else {
            $req->session()->put('user', $user);
            if (session()->has('url.intended')) {
                $url = $req->session()->get('url.intended');
                $req->session()->forget('url.intended');
                return redirect($url);
            } else {
                return redirect('/');
            }
        }
    }

    function logout(Request $request)
    {
        if ($request->session()->has('user')) {
            $request->session()->forget('user');
            if (session()->has('url.intended')) {
                $request->session()->forget('url.intended');
            }
        }
        return view('login');
    }

    function showRegister(Request $req)
    {
        return view('register');
    }

    function addNewUser(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'confirm_password' => 'required|max:255',
        ]);

        $user_count = User::where(['email' => $req->email])->count();
        if ($user_count == 0 && $req->password == $req->confirm_password) {
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->save();
            $req->session()->put('user', $user);
            return redirect('/');
        } else return  Redirect::back()->withErrors(['msg', 'The Message']);
        //view('register', ['error' => True]);
        //Redirect::back()->withErrors(['msg', 'The Message']);
    }

    function showAddress(Request $req)
    {
        $userId =  $req->session()->get('user')['id'];
        $addresses = Address::where('user_id', $userId)->get();
        return view('address', ['addresses' => $addresses]);
    }

    function addAddress(Request $req)
    {
        $req->validate([
            'address' => 'required|max:255',
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'region' => 'required|max:255',
            'zip' => 'required|max:50',
            'country' => 'required|max:255',
        ]);

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

    public function ajaxCheckForRegistration(Request $req)
    {
        $user_count = User::where(['email' => $req->email])->count();
        if ($user_count == 0 && $req->password == $req->confirm_password) {
            return response()->json(['validation' => True]);
        } else {
            return response()->json(['validation' => False]);
        }
    }

    public function ajaxCheckForUser(Request $req)
    {
        $user_count = User::where(['email' => $req->email])->count();
        if ($user_count > 0) {
            $response = array('found' => true);
        } else {
            $response = array('found' => false);
        }
    }

    public function ajaxCheckForMatch(Request $req)
    {
        if ($req->password == $req->confirm_password) {
            $response = array('pw_match' => true);
        } else {
            $response = array('pw_match' => false);
        }
        return response()->json($response);
    }
}
