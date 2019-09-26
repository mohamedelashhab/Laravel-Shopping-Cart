<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('user.signin');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        Auth::attempt(['email' => $request['email'], 'password' => bcrypt($request['password'])]);
        return redirect('/');
    }

    public function getRegister()
    {
        return view('user.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'name' => 'required|min:1'
        ]);
        $request['password'] = bcrypt($request['password']);
        // dd($request->all());
        User::create(
            $request->all()
        );

        Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
        return redirect('/');

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
