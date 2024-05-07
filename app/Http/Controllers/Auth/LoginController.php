<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();
        
        if (!isset($user) || !Hash::check($credentials['password'], $user->password)) {
            return redirect()->route('login')->with('error', 'Email atau password salah.');
        }

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        // Lakukan logout pengguna
        Auth::logout();

        // Invalidasi sesi pengguna
        $request->session()->invalidate();

        // Regenerasi token sesi pengguna
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect('/login');
    }
}
