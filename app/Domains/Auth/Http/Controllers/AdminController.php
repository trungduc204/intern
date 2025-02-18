<?php

namespace App\Domains\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showFormLogin(){
        return view('layouts.login');
    }
    public function showFormRegister(){
        return view('layouts.register');
    }
}
