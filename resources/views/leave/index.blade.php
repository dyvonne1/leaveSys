<x-layout title="All Leave Requests">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">All Leave Requests</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">#</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Employee</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Type</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Start</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">End</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($leaveRequests as $leave)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-500">{{ $leave->id }}</td>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $leave->employee_name }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $leave->leave_type }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $leave->start_date }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $leave->end_date }}</td>
                    <td class="px-4 py-3">
                        @if($leave->status === 'Approved')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Approved</span>
                        @elseif($leave->status === 'Rejected')
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold">Rejected</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">Pending</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex gap-2 flex-wrap">
                        <a href="{{ route('leave.show', $leave) }}"
                           class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">View</a>

                        {{-- Approve --}}
                        <form action="{{ route('leave.updateStatus', $leave) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="Approved">
                            <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">✔</button>
                        </form>

                        {{-- Reject --}}
                        <form action="{{ route('leave.updateStatus', $leave) }}" method="POST">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="Rejected">
                            <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">✘</button>
                        </form>

                        {{-- Delete --}}
                        <form action="{{ route('leave.destroy', $leave) }}" method="POST"
                              onsubmit="return confirm('Delete this request?')">
                            @csrf @method('DELETE')
                            <button class="bg-gray-400 text-white px-3 py-1 rounded text-xs hover:bg-gray-500">🗑</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-gray-400">No leave requests found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $leaveRequests->links() }}
    </div>

</x-layout>