<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
//            'is_active' => 1
        ]);

       $user = User::query()
           ->where('email', $request->email)
//           ->where('is_admin', 1)
           ->where('is_active', 1)
           ->exists();

       if(!$user){
           return back()->with('loginError', 'Login Failed. Admin not active!');
       }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed');

    }

    public function logout()
    {
        Auth::logout();
        \request()->session()->invalidate();
        \request()->session()->regenerateToken();
        return redirect('/login');
    }
}
