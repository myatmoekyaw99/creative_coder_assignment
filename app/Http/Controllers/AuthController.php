<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    //
    public function index(){
        return view('register.create');
    }

    public function login(){
        return view('login');
    }

    public function storeUser(){
        // dd(request()->all());
        $cleanData = request()->validate([
            "name" => ['required','min:5','max:20'],
            "username" => ['required',Rule::unique('users','username')],
            "email" => ['required','email',Rule::unique('users','email')],
            "password" => ['required'],
        ],[
            "name.min" => "name must be greater than 5 word",
        ]);
        
        $cleanData['role_id'] = 2;
        $user = User::create($cleanData);
        return redirect('/');
    }

    public function checkUser(){
        $cleanData = request()->validate([
            "email" => ['required','email',Rule::exists('users','email')],
            "password" => ['required'],
        ]);

        if(auth()->attempt($cleanData)){
            return redirect('/')->with('success','Welcome back '.auth()->user()->name);
        }else{
            return back()->withErrors(['email' => 'Credentials something wrong!']);
        };
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
