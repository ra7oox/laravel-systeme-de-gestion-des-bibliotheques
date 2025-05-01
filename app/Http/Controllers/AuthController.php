<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
public function loginForm(){
    return view("auth.login");
}
public function registerForm(){
    return view("auth.register");
}
public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',  // Assurer que c'est bien un email
        'password' => 'required'
    ]);
    $user=User::where("email",$request->email)->first();
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Protection contre session fixation
        if($user->account_type=="admin"){
            return redirect()->route('dashboard-admin')->with('success', 'Bienvenue sur votre tableau de bord !');

        }
        return redirect()->route('dashboard-lecteur')->with('success', 'Bienvenue sur votre tableau de bord !');

    }

    return back()->with('error', 'Email ou mot de passe incorrect.');
}
public function register(Request $request)
{
    $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|email|unique:users,email",
        "password" => "required|confirmed|min:6",
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'account_type'=>'formateur',
        'password' => Hash::make($request->password), // Mot de passe crypté !!
        
    ]);

    return redirect()->route('loginForm')->with('success', 'Votre compte a été créé avec succès.');
}
public function logout(){
    Auth::logout();
    return redirect()->route("loginForm")->with("success","vous etes deconnecté avec syccess");
}
}
