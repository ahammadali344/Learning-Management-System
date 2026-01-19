<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminStudentController extends Controller
{
    /* ======================
       List Students
    ====================== */
    public function index(Request $request)
    {
        $students = User::whereHas('roles', fn ($q) =>
                $q->where('name', 'student')
            )
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('name', 'like', "%{$request->search}%")
                      ->orWhere('email', 'like', "%{$request->search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('admin.users.students.index', compact('students'));
    }

    /* ======================
       Create Student Form
    ====================== */
    public function create()
    {
        return view('admin.users.students.create');
    }

    /* ======================
       Store Student  ✅ FIXED
    ====================== */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create user
        $student = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'status'   => 'active',
        ]);

        // Attach STUDENT role
        $studentRole = Role::where('name', 'student')->first();

        if (!$studentRole) {
            abort(500, 'Student role not found');
        }

        $student->roles()->attach($studentRole->id);

        return redirect()
            ->route('admin.users.students.index')
            ->with('success', 'Student created successfully');
    }

    /* ======================
       Edit Student
    ====================== */
    public function edit(User $user)
    {
        return view('admin.users.students.edit', compact('user'));
    }

    /* ======================
       Update Student
    ====================== */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()
            ->route('admin.users.students.index')
            ->with('success', 'Student updated successfully');
    }

    /* ======================
       Toggle Status
    ====================== */
    public function toggleStatus(User $user)
    {
        $user->update([
            'status' => $user->status === 'active' ? 'blocked' : 'active',
        ]);

        return back()->with('success', 'Student status updated');
    }

    /* ======================
       Delete Student
    ====================== */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'Student deleted');
    }
}
