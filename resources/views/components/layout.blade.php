<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Leave System' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-blue-700 text-white px-6 py-4 shadow">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold">📋 Leave System</a>
            <div class="flex items-center gap-4 text-sm">
                <span class="bg-blue-600 px-3 py-1 rounded-full">
                    {{ auth()->user()->isAdmin() ? '👨‍💼 Admin' : '👨‍🏫 Teacher' }}
                    — {{ auth()->user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-white text-blue-700 px-3 py-1 rounded font-semibold hover:bg-blue-50 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-8 px-4 pb-12">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{ $slot }}
    </main>

</body>
</html>