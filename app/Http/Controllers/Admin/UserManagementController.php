<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserManagementController extends Controller
{
    /**
     * Pastikan hanya Super Admin yang dapat mengakses
     * Manajemen Pengguna.
     */
    protected function authorizeSuperAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'super_admin') {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    }

    /**
     * Menampilkan daftar Admin dan Super Admin.
     */
    public function index()
    {
        $this->authorizeSuperAdmin();

        $users = User::whereIn('role', ['admin', 'super_admin'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Form tambah pengguna.
     */
    public function create()
    {
        $this->authorizeSuperAdmin();

        return view('admin.users.create');
    }

    /**
     * Menyimpan pengguna baru.
     */
    public function store(Request $request)
    {
        $this->authorizeSuperAdmin();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,super_admin',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        $this->createActivityLog(
            'Menambah pengguna: ' . $user->email
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Form edit pengguna.
     */
    public function edit(User $user)
    {
        $this->authorizeSuperAdmin();

        // Manajemen Pengguna hanya untuk admin dan super admin.
        if (!in_array($user->role, ['admin', 'super_admin'])) {
            abort(404);
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Memperbarui pengguna.
     */
    public function update(Request $request, User $user)
    {
        $this->authorizeSuperAdmin();

        if (!in_array($user->role, ['admin', 'super_admin'])) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,super_admin',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        $this->createActivityLog(
            'Memperbarui pengguna: ' . $user->email
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Menghapus pengguna.
     */
    public function destroy(User $user)
    {
        $this->authorizeSuperAdmin();

        if (!in_array($user->role, ['admin', 'super_admin'])) {
            abort(404);
        }

        // Tidak boleh menghapus akun sendiri.
        if ($user->id === Auth::id()) {
            return redirect()
                ->route('users.index')
                ->with('error', 'Anda tidak dapat menghapus akun yang sedang digunakan.');
        }

        $email = $user->email;

        $user->delete();

        $this->createActivityLog(
            'Menghapus pengguna: ' . $email
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }

    /**
     * Membuat activity log.
     */
    private function createActivityLog(string $action)
    {
        try {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => $action,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            Log::error(
                'ActivityLog create failed: ' . $e->getMessage()
            );
        }
    }
}
