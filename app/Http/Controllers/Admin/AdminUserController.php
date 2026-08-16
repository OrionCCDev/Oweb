<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderByRaw("role = 'super_admin' desc")->orderBy('name')->get();
        return view('admin.admin-users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.admin-users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required', Rule::in(['admin', 'super_admin'])],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.admin-users.index')
            ->with('success', 'Admin user created successfully.');
    }

    public function edit(User $admin_user)
    {
        return view('admin.admin-users.edit', ['user' => $admin_user]);
    }

    public function update(Request $request, User $admin_user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($admin_user->id)],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'role' => ['required', Rule::in(['admin', 'super_admin'])],
        ]);

        if ($admin_user->id === $request->user()->id && $validated['role'] !== 'super_admin' && $this->isLastSuperAdmin($admin_user)) {
            return back()->with('error', "You can't remove your own super admin role — it would leave no super admin able to manage accounts.");
        }

        $admin_user->name = $validated['name'];
        $admin_user->email = $validated['email'];
        $admin_user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $admin_user->password = Hash::make($validated['password']);
        }

        $admin_user->save();

        return redirect()->route('admin.admin-users.index')
            ->with('success', 'Admin user updated successfully.');
    }

    public function destroy(Request $request, User $admin_user)
    {
        if ($admin_user->id === $request->user()->id) {
            return back()->with('error', "You can't delete your own account.");
        }

        if ($this->isLastSuperAdmin($admin_user)) {
            return back()->with('error', 'This is the last super admin account — delete or demote another super admin first.');
        }

        $admin_user->delete();

        return redirect()->route('admin.admin-users.index')
            ->with('success', 'Admin user deleted successfully.');
    }

    private function isLastSuperAdmin(User $user): bool
    {
        return $user->isSuperAdmin() && User::where('role', 'super_admin')->count() <= 1;
    }
}
