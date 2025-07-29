<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login_view');
    }
     public function showRegister()
    {
        return view('auth.register_view');
    }
    public function register(Request $request){
        $incomingField = $request->validate([
            'name' => ['required','min:3', Rule::unique('users','name')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','min:8','max:200','confirmed'],
        ]);
        // $incomingField['password'] =bcrypt($incomingField['password']);
        $user =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pelanggan',
        ]);
        Auth::login($user);
        return redirect('/');
    }

    public function login(Request $request){
        $incomingField = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt($incomingField)){
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'apoteker') {
                return redirect()->intended('/apoteker/dashboard');
            } elseif ($user->role === 'pelanggan') {
                return redirect()->intended('/'); // Redirect pelanggan ke halaman utama
            }
            
            // Fallback default jika role tidak terdefinisi
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
