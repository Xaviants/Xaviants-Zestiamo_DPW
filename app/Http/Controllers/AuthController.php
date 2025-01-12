<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form registrasi
    function showRegister() {
        return view('auth.register');
    }

    // Menangani form registrasi
    function submitRegister(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
    
        // Redirect ke halaman login agar pengguna dapat login setelah registrasi
        return redirect()->route('login')->with('success', 'Registration successful, please login.');
    }

    // Menampilkan form login
    function showLogin() {
        return view('auth.login');
    }

    // Menangani form login
    function submitLogin(Request $request) {
        $data = $request->only('name', 'password');
        
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home.show');
        } else {
            return redirect()->back()->with('failed', 'Username or Password are incorrect!');
        }
    }

    // Menangani logout
    function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    // Menampilkan form forgot password
    function showResetForm() {
        return view('auth.forgotPassword');
    }

    // Menangani form reset password
    public function resetPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email', // Email wajib diisi dan valid
            'password' => 'required|string|min:8|confirmed', // Password harus sesuai dengan konfirmasi
        ]);

        // Cari pengguna berdasarkan email
        $user = DB::table('users')->where('email', $request->email)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors(['email' => 'Email not found in our records.'])->withInput();
        }

        // Perbarui password di database
        DB::table('users')->where('email', $request->email)->update([
            'password' => Hash::make($request->password), // Enkripsi password baru
            'updated_at' => now(), // Perbarui waktu
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('status', 'Password has been successfully updated!');
    }   
}
