<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
    <title>Positions</title>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-28 pt-10">
        <h1 class="text-2xl font-bold mb-4">Form View</h1>

        {{-- Error Messages --}}
        @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Input Form --}}
        <form method="POST" action="{{ route('position.store') }}" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('post')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">Name:</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>

            <div class="mb-4">
                <label for="reports_to" class="block text-gray-700 font-medium mb-1">Reports to:</label>
                <select id="reports_to" name="reports_to" class="w-full px-3 py-2 border border-gray-300 rounded">
                    <option value="">None</option>
                    <option value="Developer 1">Developer 1</option>
                    <option value="Developer 2">Developer 2</option>
                    <option value="Developer 3">Developer 3</option>
                    <option value="Senior Developer 1">Senior Developer 1</option>
                    <option value="Senior Developer 2">Senior Developer 2</option>
                    <option value="Development Lead">Development Lead</option>
                    <option value="Manager">Manager</option>
                    <option value="QA Lead">QA Lead</option>
                    <option value="Senior QA Lead">Senior QA Lead</option>
                    <option value="QA Tester 1">QA Tester 1</option>
                    <option value="QA Tester 2">QA Tester 2</option>
                    <option value="CEO">CEO</option>
                </select>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
            </div>
        </form>

        <h1 class="text-2xl font-bold mb-4 mt-8">Table View</h1>

        {{-- Search Form --}}
        <div class="mt-8">
            <form action="{{ route('position.index') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Search positions..."
                    value="{{ request()->get('search') }}" class="w-full px-3 py-2 border border-gray-300 rounded mr-2">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Search</button>
            </form>
        </div>

        {{-- Positions Table --}}
        <div class="mt-2 bg-white p-6 rounded shadow-md overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 border-b text-left">Position</th>
                        <th class="px-4 py-2 border-b text-left">Reports to</th>
                        <th class="px-4 py-2 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($positions as $position)
                    <tr>
                        <td class="px-4 py-2 border-b break-words">{{ $position->name }}</td>
                        <td class="px-4 py-2 border-b break-words">{{ $position->reports_to }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('position.edit', ['position' => $position->id]) }}"
                                class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('position.destroy', ['position' => $position->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
