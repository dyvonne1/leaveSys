<x-layout title="Leave Request Details">

    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Leave Request #{{ $leaveRequest->id }}</h1>
            <a href="{{ route('leave.index') }}" class="text-blue-600 hover:underline text-sm">← Back to list</a>
        </div>

        <div class="bg-white rounded-lg shadow p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-500 font-medium">Employee Name</p>
                    <p class="text-gray-800 font-semibold">{{ $leaveRequest->employee_name }}</p>
                </div>
                <div>
                    <p class="text-gray-500 font-medium">Email</p>
                    <p class="text-gray-800">{{ $leaveRequest->employee_email }}</p>
                </div>
                <div>
                    <p class="text-gray-500 font-medium">Leave Type</p>
                    <p class="text-gray-800">{{ $leaveRequest->leave_type }}</p>
                </div>
                <div>
                    <p class="text-gray-500 font-medium">Status</p>
                    @if($leaveRequest->status === 'Approved')
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Approved</span>
                    @elseif($leaveRequest->status === 'Rejected')
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold">Rejected</span>
                    @else
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">Pending</span>
                    @endif
                </div>
                <div>
                    <p class="text-gray-500 font-medium">Start Date</p>
                    <p class="text-gray-800">{{ $leaveRequest->start_date }}</p>
                </div>
                <div>
                    <p class="text-gray-500 font-medium">End Date</p>
                    <p class="text-gray-800">{{ $leaveRequest->end_date }}</p>
                </div>
            </div>

            <div>
                <p class="text-gray-500 font-medium text-sm">Reason</p>
                <p class="text-gray-800 mt-1">{{ $leaveRequest->reason }}</p>
            </div>
        </div>
    </div>

</x-layout>