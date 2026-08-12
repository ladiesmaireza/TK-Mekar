<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard pengguna
     */
    public function index()
    {
        return view('pengguna.dashboard', [
            'user' => Auth::user(),
        ]);
    }
}
