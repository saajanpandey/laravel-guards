<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}
