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
        $url = $request->session()->has('oldUrl') ? request()->url() : '/profile';
        
        // dd($request->all());
        if(Auth::attempt(['email' => $request['email'], 'password' => bcrypt($request['password'])])){
            $request->session()->forget('oldUrl');
            return redirect($url);
        }else{
            return redirect()->route('user.login-form');
        }
        
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
       $user = User::create(
            $request->all()
        );

        if($user){
            Auth::login($user);
            $url = $request->session()->has('oldUrl') ? request()->url() : '/profile';
            $request->session()->forget('oldUrl');
        }
        else{
            
            return back();
        }


        // $request['password'] = bcrypt($request['password']);
        // if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
        //     $url = $request->session()->has('oldUrl') ? request()->url() : '/profile';
        //     $request->session()->forget('oldUrl');
        //     return redirect($url);
        // }
        

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function profile()
    {
        return view('user.profile');
    }
}
