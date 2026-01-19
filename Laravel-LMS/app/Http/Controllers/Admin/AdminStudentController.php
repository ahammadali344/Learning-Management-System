<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminStudentController extends Controller
{
    public function index(Request $request)
    {
        $students = User::whereHas('roles', fn ($q) =>
                $q->where('name', 'student')
            )
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.users.students.index', compact('students'));
    }

    public function edit(User $user)
    {
        return view('admin.users.students.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()
            ->route('admin.users.students.index')
            ->with('success', 'Student updated successfully');
    }

    public function toggleStatus(User $user)
    {
        $user->update([
            'status' => $user->status === 'active' ? 'blocked' : 'active',
        ]);

        return back()->with('success', 'Student status updated');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'Student deleted');
    }
}
