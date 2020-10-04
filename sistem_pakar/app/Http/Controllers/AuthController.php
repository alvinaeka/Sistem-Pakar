<?php

namespace App\Http\Controllers;
use App\User;
use Validator,Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }
    public function postlogin(Request $request)
    {
        $login = $request->only('email', 'password');
        $user = user::where('email', $login['email'])->first();
        if (Auth::attempt($login)) 
        {
            // Authentication passed..
            if($user->role == "member")
            {
                return redirect('/DiagnosaPenyakit');
            }elseif($user->role == "admin")
            {
                return redirect('/DataPenyakit');
            }
        }else
        {
        return redirect('/login')->with('statusdanger', 'email atau password salah');
        }   
    
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function postregister(Request $request)
    {
        
        $request->validate(
            [
                'email' => 'unique:users',
                'password' => 'confirmed',
            ],
            [
                'email.unique' => 'email sudah terdaftar, silahkan masukkan email lain',
                'password.confirmed' => 'password harus sama'
                ]
            );
            User::create([
                'name' => $request['nama'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => 'member',
                ]);
                return redirect('/login')->with('status', 'Akun berhasil dibuat, silahkan log in');
            }
        }