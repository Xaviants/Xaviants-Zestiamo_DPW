<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showRegister() {
        return view('auth.register');
    }

    function submitRegister(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login.show');
    }

    function showLogin() {
        return view('auth.login');
    }

    function submitLogin(Request $request) {
        $data = $request->only('email', 'password');
        
        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home.show');
        } else {
            return redirect()->back()->with('failed', 'Email or Password are incorrect!');
        }
    }

    function showFP() {
        return view('auth.forgotPassword');
    }
}
