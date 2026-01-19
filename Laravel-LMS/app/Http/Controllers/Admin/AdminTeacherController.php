<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::whereHas('roles', fn ($q) =>
                $q->where('name', 'teacher')
            )
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('name', 'like', "%{$request->search}%")
                      ->orWhere('email', 'like', "%{$request->search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('admin.users.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.users.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $teacher = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'status'   => 'active',
        ]);

        $teacherRole = Role::where('name', 'teacher')->firstOrFail();
        $teacher->roles()->attach($teacherRole->id);

        return redirect()
            ->route('admin.users.teachers.index')
            ->with('success', 'Teacher created successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.teachers.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()
            ->route('admin.users.teachers.index')
            ->with('success', 'Teacher updated successfully');
    }

    public function toggleStatus(User $user)
    {
        $user->update([
            'status' => $user->status === 'active' ? 'blocked' : 'active',
        ]);

        return back()->with('success', 'Teacher status updated');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'Teacher deleted');
    }
}
