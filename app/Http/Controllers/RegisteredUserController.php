<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(){
        return view("auth.register");
    }
    public function store(){
       $validatedUser= request()->validate([
            'name'=>['required'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','confirmed',Password::min(5)],
        ]);
        $validatedEmployer= request()->validate([
            'employer'=>['required'],
            'logo'=>['required',File::types(['png','jpg'])]
        ]);
        $user=User::create($validatedUser);
        $logoPath= request()->logo->store('logos');
        $user->employer()->create([
            'name'=>$validatedEmployer['employer'],
            'logo'=>$logoPath
        ]);
        Auth::login($user);
        return redirect('/');
    }
}
