<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'id_username' => 'required|digits:10', 
        'password' => 'required|min:5|max:10',
    ]);

    // Cek kredensial
    if (Auth::attempt(['id_username' => $request->id_username, 'password' => $request->password])) {
        // Cek role pengguna
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard'); // Arahkan ke dashboard admin
        }
        if ($user->role === 'dokter') {
            return redirect()->intended('/consultations/dashboard'); // Arahkan ke dashboard doctor
        }
        if ($user->role === 'kasir') {
            return redirect()->intended('/kasir/dashboard'); // Arahkan ke dashboard doctor
        }
          
        // Arahkan ke dashboard umum jika bukan admin
        return redirect()->intended('/');
    }

    return back()->withErrors([
        'id_username' => 'ID atau Password salah.',
    ]);
}

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_username' => 'required|digits:10|unique:users,id_username', // Sesuaikan dengan kolom id_username
            'password' => 'required|min:5|max:10',
            'role' => 'required|in:admin,kasir,dokter',
        ]);

        // Membuat pengguna baru dengan hashing password
        User::create([
            'id_username' => $request->id_username, // Menggunakan id_username sesuai dengan tabel
            'password' => Hash::make($request->password), // Hash password
            'role' => $request->role,
        ]);

        // Login otomatis setelah pendaftaran
        Auth::attempt($request->only('id_username', 'password'));

        // Pesan sukses
        $message = "Registrasi berhasil! Selamat datang kembali.";
        return redirect()->intended('/dashboard')->with('success', $message);
    }
}
