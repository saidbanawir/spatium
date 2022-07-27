<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardLoginController extends Controller
{
    public function index(){
        return view('dashboard.login.index', [
            'tittle' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('webperusahaan')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {  
        Auth::guard('webperusahaan')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/dashboard/login');
    }
}
