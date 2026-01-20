<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class AdminEnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $enrollments = Enrollment::with(['student', 'course'])
            ->when($request->search, function ($q) use ($request) {
                $q->whereHas('student', function ($s) use ($request) {
                    $s->where('name', 'like', "%{$request->search}%")
                      ->orWhere('email', 'like', "%{$request->search}%");
                })
                ->orWhereHas('course', function ($c) use ($request) {
                    $c->where('title', 'like', "%{$request->search}%");
                });
            })
            ->orderByDesc('enrolled_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function approve(Enrollment $enrollment)
    {
        $enrollment->update([
            'status' => Enrollment::STATUS_APPROVED,
        ]);

        return back()->with('success', 'Enrollment approved');
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->update([
            'status' => Enrollment::STATUS_REJECTED,
        ]);

        return back()->with('success', 'Enrollment rejected');
    }
}
