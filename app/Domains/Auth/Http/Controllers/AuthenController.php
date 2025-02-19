<?php

namespace App\Domains\Auth\Http\Controllers;

use App\Domains\Auth\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }
    public function handleLogin() {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
    
            /**
             * @var User $user
             */
            $user = Auth::user();
    
            if ($user->isAdmin()) {
                return redirect()->route('admin.app');
            }
            return redirect()->route('error.403');
            
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
        public function showFormRegister()
    {
        return view('auth.register');
    }
    public function handleRegister()
    {
        $data =  request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $user = User::query()->create($data);
        Auth::login($user);
        request()->session()->regenerate();
        return redirect()->route('admin.app');
    }   
    public function logout()
{
    Auth::logout();
 
    request()->session()->invalidate();
 
    request()->session()->regenerateToken();
 
    return redirect()->route('login');
}
}
