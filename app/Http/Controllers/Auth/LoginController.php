<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (session()->get('cart')){
                return redirect()->route('cart');
            } else {
                return redirect()->intended();
            }
           
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy(){
        Auth::logout();

        return redirect('/');
    }

    public function register(){
        return Inertia::render('Auth/Register');
    }
}
