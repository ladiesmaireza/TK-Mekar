<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrangTuaAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM REGISTER ORANG TUA
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        /*
        |----------------------------------------------------------------------
        | Tampilkan halaman register
        |----------------------------------------------------------------------
        |
        | Jangan melakukan pengecekan guard di sini.
        | Pengguna harus selalu bisa membuka halaman pendaftaran akun.
        |
        */

        return view('orangtua.register');
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN AKUN ORANG TUA
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:255',

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:orang_tua,email',
                ],

                'password' => [
                    'required',
                    'string',
                    'min:6',
                    'confirmed',
                ],
            ],
            [
                'nama.required' =>
                    'Nama orang tua wajib diisi.',

                'nama.string' =>
                    'Nama orang tua harus berupa teks.',

                'nama.max' =>
                    'Nama orang tua maksimal 255 karakter.',

                'email.required' =>
                    'Email wajib diisi.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.max' =>
                    'Email maksimal 255 karakter.',

                'email.unique' =>
                    'Email tersebut sudah terdaftar. Silakan gunakan email lain.',

                'password.required' =>
                    'Password wajib diisi.',

                'password.string' =>
                    'Password harus berupa teks.',

                'password.min' =>
                    'Password minimal 6 karakter.',

                'password.confirmed' =>
                    'Konfirmasi password tidak sama.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | SIMPAN AKUN
        |--------------------------------------------------------------------------
        */

        OrangTua::create([
            'nama' => $request->nama,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),
        ]);


        /*
        |--------------------------------------------------------------------------
        | SETELAH REGISTER
        |--------------------------------------------------------------------------
        |
        | Tidak langsung login.
        | Pengguna diarahkan ke halaman Login Orang Tua.
        |
        */

        return redirect()
            ->route('orangtua.login')
            ->with(
                'success',
                'Akun berhasil dibuat. Silakan login menggunakan email dan password Anda.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | FORM LOGIN ORANG TUA
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        /*
        |----------------------------------------------------------------------
        | Tampilkan halaman login
        |----------------------------------------------------------------------
        |
        | Jangan melakukan redirect otomatis berdasarkan guard.
        | Halaman login tetap bisa dibuka secara langsung.
        |
        */

        return view('orangtua.login');
    }


    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN ORANG TUA
    |--------------------------------------------------------------------------
    */

    public function authenticate(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate(
            [
                'email' => [
                    'required',
                    'email',
                ],

                'password' => [
                    'required',
                    'string',
                ],
            ],
            [
                'email.required' =>
                    'Email wajib diisi.',

                'email.email' =>
                    'Format email tidak valid.',

                'password.required' =>
                    'Password wajib diisi.',

                'password.string' =>
                    'Password tidak valid.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | CARI AKUN ORANG TUA
        |--------------------------------------------------------------------------
        */

        $orangTua = OrangTua::where(
            'email',
            $request->email
        )->first();


        /*
        |--------------------------------------------------------------------------
        | AKUN TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$orangTua) {
            return back()
                ->withInput(
                    $request->only('email')
                )
                ->with(
                    'error',
                    'Email tidak ditemukan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK PASSWORD
        |--------------------------------------------------------------------------
        */

        if (
            !Hash::check(
                $request->password,
                $orangTua->password
            )
        ) {
            return back()
                ->withInput(
                    $request->only('email')
                )
                ->with(
                    'error',
                    'Password salah.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | LOGIN ORANG TUA
        |--------------------------------------------------------------------------
        */

        Auth::guard('orangtua')->login(
            $orangTua
        );


        /*
        |--------------------------------------------------------------------------
        | REGENERATE SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | SETELAH LOGIN
        |--------------------------------------------------------------------------
        |
        | Setelah berhasil login, langsung masuk ke Step 2.
        |
        */

        return redirect()
            ->route('ppdb.step2')
            ->with(
                'success',
                'Selamat datang, ' .
                $orangTua->nama .
                '. Silakan lengkapi data calon peserta didik.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ORANG TUA
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | CEK LOGIN
        |--------------------------------------------------------------------------
        */

        if (
            !Auth::guard('orangtua')->check()
        ) {
            return redirect()
                ->route('orangtua.login')
                ->with(
                    'error',
                    'Silakan login terlebih dahulu.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | DATA ORANG TUA YANG LOGIN
        |--------------------------------------------------------------------------
        */

        $orangTua = Auth::guard(
            'orangtua'
        )->user();


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'orangtua.dashboard',
            compact('orangTua')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT ORANG TUA
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | LOGOUT GUARD
        |--------------------------------------------------------------------------
        */

        Auth::guard('orangtua')->logout();


        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->invalidate();


        /*
        |--------------------------------------------------------------------------
        | BUAT TOKEN SESSION BARU
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerateToken();


        /*
        |--------------------------------------------------------------------------
        | KEMBALI KE LOGIN
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('orangtua.login')
            ->with(
                'success',
                'Anda berhasil logout.'
            );
    }
}
