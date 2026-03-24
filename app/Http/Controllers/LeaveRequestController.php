<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    // ─── TEACHER ────────────────────────────────────────────

    public function teacherDashboard()
    {
        $leaveRequests = LeaveRequest::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('teacher.dashboard', compact('leaveRequests'));
    }

    public function create()
    {
        return view('teacher.leave.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required|in:Sick Leave,Vacation Leave,Emergency Leave',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'reason'     => 'required|string',
        ]);

        LeaveRequest::create([
            'user_id'        => auth()->id(),
            'employee_name'  => auth()->user()->name,
            'employee_email' => auth()->user()->email,
            'leave_type'     => $request->leave_type,
            'start_date'     => $request->start_date,
            'end_date'       => $request->end_date,
            'reason'         => $request->reason,
        ]);

        return redirect()->route('teacher.dashboard')
            ->with('success', 'Leave request submitted successfully!');
    }

    public function show(LeaveRequest $leaveRequest)
    {
        // Teacher: makita lang sarili niya
        if (auth()->user()->isTeacher() && $leaveRequest->user_id !== auth()->id()) {
            abort(403);
        }

        $view = auth()->user()->isAdmin()
            ? 'admin.leave.show'
            : 'teacher.leave.show';

        return view($view, compact('leaveRequest'));
    }

    // ─── ADMIN ──────────────────────────────────────────────

    public function adminDashboard()
    {
        $leaveRequests = LeaveRequest::with('user')->latest()->paginate(10);
        $stats = [
            'total'    => LeaveRequest::count(),
            'pending'  => LeaveRequest::where('status', 'Pending')->count(),
            'approved' => LeaveRequest::where('status', 'Approved')->count(),
            'rejected' => LeaveRequest::where('status', 'Rejected')->count(),
        ];

        return view('admin.dashboard', compact('leaveRequests', 'stats'));
    }

    public function updateStatus(Request $request, LeaveRequest $leaveRequest)
    {
        $request->validate([
            'status' => 'required|in:Approved,Rejected',
        ]);

        $leaveRequest->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard')
            ->with('success', "Leave request {$request->status}!");
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        $leaveRequest->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Leave request deleted!');
    }
}