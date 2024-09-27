<?php

namespace App\Http\Controllers;

use App\Models\TUserLogin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\ReCaptcha;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'login_id' => 'required|min:6|max:20|unique:tuser',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:50',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $validasi = [
            'login_id' => $validatedData['login_id'],
            'email' => $validatedData['email'],
            'login_pw' => md5($validatedData['password']),
            'password' => Hash::make($validatedData['password']),
            'point' => 0,
            'gamepoints' => 0,
            'create_at' => date('Y-m-d H:i:s'),
            'token' => 123,
        ];

        $user = User::create($validasi);

        // Simpan data ke tabel 'TUserLogin' menggunakan ID user yang baru saja dibuat
        TUserLogin::create([
            'user_id' => $user->id,
            'session_id' => '',
            'token' => 123, // Jika tabel ini memiliki kolom created_at
            'login' => 0  // Jika tabel ini memiliki kolom updated_at
        ]);


        return redirect('/register')->with('success', 'Registration Successful!');
    }
}
