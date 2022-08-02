<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|min:6|max:20',
            'birthday'=>''
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/');
    }
}