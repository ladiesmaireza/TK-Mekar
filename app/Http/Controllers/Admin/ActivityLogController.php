<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    protected function authorizeSuperAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'super_admin') {
            abort(403);
        }
    }

    public function index()
    {
        $this->authorizeSuperAdmin();

        $logs = ActivityLog::with('user')->latest()->paginate(20);

        return view('admin.logs.index', compact('logs'));
    }
}
