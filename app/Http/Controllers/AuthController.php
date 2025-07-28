<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }
     public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request){
        $incomingField = $request->validate([
            'name' => ['required','min:3', Rule::unique('users','name')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','min:8','max:200'],
        ]);
        $incomingField['password'] =bcrypt($incomingField['password']);
        $user =User::create($incomingField);
        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request){
        $incomingField = $request->validate([
            'emailLogin' => 'required',
            'passwordLogin' => 'required',
        ]);
        if(auth()->attempt(['email'=> $incomingField['emailLogin'],'password'=>$incomingField['passwordLogin']])){
            $request->session()->regenerate();  
        }
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
