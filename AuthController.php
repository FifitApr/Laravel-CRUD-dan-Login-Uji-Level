<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller

{
        public function index()
        {
            return view('login');
        }
    
        public function postlogin(Request $request)
        {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
       
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user->level == 'admin') {
                    return redirect()->intended('admin')->withSuccess('You have Successfully login');
                }elseif ($user->level == 'editor') {
                    return redirect()->intended('editor')->withSuccess('You have Successfully login');
                }
                return redirect()->intended('/login')->withSuccess('You Dont Have Account');
            }
            return redirect('login');
        }
    
        public function logout(Request $request)
        {
            $request->session()->flush();
            Auth::logout();
            return Redirect('login');
        }
}
    