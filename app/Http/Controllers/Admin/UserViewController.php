<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserViewController extends Controller
{
    /**
     * Menampilkan daftar pengguna untuk Admin.
     *
     * Admin hanya dapat melihat data pengguna.
     */
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.users.index', compact('users'));
    }
}
