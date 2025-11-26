<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto py-10">
        <div class="bg-white rounded-lg shadow p-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-900">Student Details</h1>

            @if (session('success'))
                <div id="successMessage" class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        const element = document.getElementById('successMessage');
                        if (element) {
                            element.style.transition = 'opacity 0.3s ease-out';
                            element.style.opacity = '0';
                            setTimeout(function() {
                                element.remove();
                            }, 300);
                        }
                    }, 3000);
                </script>
            @endif

            @if (session('info'))
                <!-- Info messages (like redirects) don't show popup -->
            @endif

            <div class="mb-6 pb-6 border-b border-gray-200">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <p class="text-gray-900 text-lg">{{ $student->name }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <p class="text-gray-900 text-lg">{{ $student->email }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                    <p class="text-gray-900 text-lg">{{ $student->phone }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Created At</label>
                    <p class="text-gray-500 text-sm">{{ $student->created_at ? $student->created_at->format('M d, Y H:i') : 'N/A' }}</p>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Last Updated</label>
                    <p class="text-gray-500 text-sm">{{ $student->updated_at ? $student->updated_at->format('M d, Y H:i') : 'N/A' }}</p>
                </div>
            </div>

            <div class="flex gap-4">
                <a 
                    href="{{ route('students.edit', $student) }}" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Edit
                </a>
                <form method="POST" action="{{ route('students.destroy', $student) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                    >
                        Delete
                    </button>
                </form>
                <a 
                    href="{{ route('students.index') }}" 
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                >
                    Back to List
                </a>
            </div>
        </div>
    </div>
</body>
</html>
