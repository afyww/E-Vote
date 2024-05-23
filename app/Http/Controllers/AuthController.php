<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login()
    {

        return view('login');
    }


    function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->level === 'admin') {
                return redirect(route('dashboard'))->with('toast_success', 'Berhasil Login !');
            } elseif (Auth::user()->level === 'pemilih') {
                return redirect(route('dashboarduser'))->with('success', 'User Berhasil Dibuat !');
            }
        }

        return back()->with('error', 'Password atau Email Salah!');
    }


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'level' => 'required|string|in:admin,pemilih',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->level = $validatedData['level'];
        $user->save();

        return redirect('/user')->with('success', 'User Berhasil Dibuat !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('toast_success', 'Berhasil Logout !');
    }
}
