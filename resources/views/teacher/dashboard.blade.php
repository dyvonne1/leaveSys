<x-layout title="Teacher Dashboard">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">👨‍🏫 My Leave Requests</h1>
        <a href="{{ route('teacher.leave.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-700 transition">
            + New Request
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">#</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Type</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Start</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">End</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($leaveRequests as $leave)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-500">{{ $leave->id }}</td>
                    <td class="px-4 py-3 text-gray-800 font-medium">{{ $leave->leave_type }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $leave->start_date }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $leave->end_date }}</td>
                    <td class="px-4 py-3">
                        @if($leave->status === 'Approved')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">✔ Approved</span>
                        @elseif($leave->status === 'Rejected')
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold">✘ Rejected</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">⏳ Pending</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <a href="{{ route('teacher.leave.show', $leave) }}"
                           class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-gray-400">
                        Wala ka pang leave request. <a href="{{ route('teacher.leave.create') }}" class="text-blue-500 underline">Mag-submit na!</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $leaveRequests->links() }}</div>

</x-layout> 