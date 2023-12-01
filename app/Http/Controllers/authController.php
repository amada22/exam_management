<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authController extends Controller
{
    public function show_login(){
        return view('login');
    }
    public function login(Request $request){
        if(Auth::attempt(["email"=>$request->email, "password"=>$request->password])){
        $request->session()->regenerate();
        return view('master'); 
        }
        return view('login');
    }




    public function show_register(){
        return view('register');
    }
    public function register(Request $request){

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return view('master');
        }


        public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return view('login');
            }
}
