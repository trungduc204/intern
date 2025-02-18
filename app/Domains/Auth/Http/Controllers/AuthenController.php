<?php

namespace App\Domains\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenController extends Controller
{
    public function showFormLogin(){
        return view('auth.login');
    }
    public function showFormRegister(){
        return view('auth.register');
    }
}
