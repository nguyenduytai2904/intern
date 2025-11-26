<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Student List</h1>
            <a href="{{ route('students.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                + Add New Student
            </a>
        </div>

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

        @if ($students->isEmpty())
            <p class="text-center text-gray-600 py-8">No students found.</p>
        @else
            <div class="overflow-hidden rounded-lg shadow">
                <table class="min-w-full divide-y divide-gray-200 bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Phone
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($students as $student)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $student->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $student->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $student->phone }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('students.show', $student) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">
                                        View
                                    </a>
                                    <a href="{{ route('students.edit', $student) }}" class="text-blue-600 hover:text-blue-900 mr-4">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('students.destroy', $student) }}" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="text-indigo-600 hover:text-indigo-800">Back to home</a>
        </div>
    </div>
</body>
</html>