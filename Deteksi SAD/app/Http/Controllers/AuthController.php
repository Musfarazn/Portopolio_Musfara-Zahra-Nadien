<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() { return view('auth.login'); }

    public function login(Request $request)
{
    $credentials = $request->only('name', 'password'); // pakai name

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    }

    return back()->withErrors(['name' => 'Login gagal, periksa username & password.']);
}


    public function showRegister() { return view('auth.register'); }

    public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string|unique:users',
        'password' => 'required|min:6|confirmed',
        'nama'     => 'required|string|max:255',
        'umur'     => 'required|integer|min:1',
        'prodi'    => 'required|string|max:100',
    ]);

    $user = User::create([
        'name'     => $request->name,
        'password' => Hash::make($request->password),
        'nama'     => $request->nama,
        'umur'     => $request->umur,
        'prodi'    => $request->prodi,
        'role'     => 'user',
    ]);

    Auth::login($user);
    return redirect()->route('user.dashboard');
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
