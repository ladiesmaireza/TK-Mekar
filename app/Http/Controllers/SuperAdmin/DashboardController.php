<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ActivityLog;

class DashboardController extends Controller
{

    public function index()
    {

        $jumlahUser = User::where('role', 'admin')->count();

        $jumlahLog = ActivityLog::count();


        return view(
            'super-admin.dashboard',
            compact(
                'jumlahUser',
                'jumlahLog'
            )
        );
    }
}
