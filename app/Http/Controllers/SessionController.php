<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class SessionController extends Controller
{
    public function create(){
        return view("auth.login");
    }
    public function store(){
        $validatedUser=request()->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);
        if(! Auth::attempt($validatedUser)){
            throw ValidationException::withMessages([
                'email'=>"credential are not right "
            ]);
        }
        request()->session()->regenerate();
        return redirect('/');
    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
