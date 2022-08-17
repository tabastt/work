<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function destroy(){

        auth()->logout();

        return redirect('/');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)){
            return redirect('/');
        }

        return back()->withInput()->withError(['email' => 'Your provided credentials could not be verified']);
        
    }
    
    public function create(){

        return view('sessions.create');
    }
}
