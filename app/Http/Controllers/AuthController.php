<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helpers\ActivityLogger;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        // Jika sudah login, arahkan sesuai role
        if (Auth::check()) {

            $user = Auth::user();

            // SUPER ADMIN
            if ($user->role === 'super_admin') {
                return redirect()->route('super.dashboard');
            }

            // ADMIN
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // PENGGUNA
            if ($user->role === 'user') {
                return redirect()->route('pengguna.dashboard');
            }

            // Jika role tidak dikenal
            Auth::logout();
        }

        return view('auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN PROCESS
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        // Validasi form login
        $request->validate(
            [
                'email' => [
                    'required',
                    'email',
                ],

                'password' => [
                    'required',
                ],
            ],
            [
                'email.required' =>
                'Email wajib diisi.',

                'email.email' =>
                'Format email tidak valid.',

                'password.required' =>
                'Password wajib diisi.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | CEK LOGIN
        |--------------------------------------------------------------------------
        */

        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])
        ) {

            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Ambil user yang berhasil login
            $user = Auth::user();


            /*
            |--------------------------------------------------------------------------
            | ACTIVITY LOG
            |--------------------------------------------------------------------------
            */

            ActivityLogger::log(
                'Login sebagai ' . $user->role
            );


            /*
            |--------------------------------------------------------------------------
            | SUPER ADMIN
            |--------------------------------------------------------------------------
            */

            if ($user->role === 'super_admin') {

                return redirect()
                    ->route('super.dashboard')
                    ->with(
                        'success',
                        'Selamat datang, ' . $user->name . '.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | ADMIN
            |--------------------------------------------------------------------------
            */

            if ($user->role === 'admin') {

                return redirect()
                    ->route('admin.dashboard')
                    ->with(
                        'success',
                        'Selamat datang, ' . $user->name . '.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | PENGGUNA
            |--------------------------------------------------------------------------
            */

            if ($user->role === 'user') {

                return redirect()
                    ->route('pengguna.dashboard')
                    ->with(
                        'success',
                        'Selamat datang, ' . $user->name . '.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | ROLE TIDAK DIKENAL
            |--------------------------------------------------------------------------
            */

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Role pengguna tidak dikenali.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | LOGIN GAGAL
        |--------------------------------------------------------------------------
        */

        return back()
            ->withInput(
                $request->only('email')
            )
            ->with(
                'error',
                'Email atau Password salah.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTER PAGE
    |--------------------------------------------------------------------------
    |
    | Catatan:
    | Register ini digunakan untuk membuat akun pengguna.
    | Akun yang dibuat dari halaman register akan memiliki
    | role = user, BUKAN admin.
    |
    */

    public function showRegister()
    {
        return view('auth.register');
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTER PROCESS
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        // Validasi data registrasi
        $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'email' => [
                    'required',
                    'email',
                    'unique:users,email',
                ],

                'password' => [
                    'required',
                    'confirmed',
                    'min:6',
                ],
            ],
            [
                'name.required' =>
                'Nama wajib diisi.',

                'email.required' =>
                'Email wajib diisi.',

                'email.email' =>
                'Format email tidak valid.',

                'email.unique' =>
                'Email sudah digunakan.',

                'password.required' =>
                'Password wajib diisi.',

                'password.confirmed' =>
                'Konfirmasi password tidak sama.',

                'password.min' =>
                'Password minimal 6 karakter.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | BUAT AKUN PENGGUNA
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            // Register umum = user
            'role' => 'user',
        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT KE LOGIN
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Registrasi berhasil. Silakan login menggunakan akun Anda.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOG
        |--------------------------------------------------------------------------
        */

        if (Auth::check()) {

            ActivityLogger::log(
                'Logout dari sistem'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | LOGOUT USER
        |--------------------------------------------------------------------------
        */

        Auth::logout();


        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->invalidate();


        /*
        |--------------------------------------------------------------------------
        | REGENERATE CSRF TOKEN
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerateToken();


        /*
        |--------------------------------------------------------------------------
        | KEMBALI KE LOGIN
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('login')
            ->with(
                'logout_success',
                'Anda telah berhasil keluar dari sistem.'
            );
    }
}
