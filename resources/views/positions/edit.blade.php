<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="container mx-auto p-28 pt-10">
        <h1 class="text-2xl font-bold mb-6">Edit a Product</h1>

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md relative mb-6">
            <strong class="font-bold">Whoops!</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('position.update', ['position' => $position]) }}" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('put')

            <div>
                <label for="name" class="block text-gray-700 font-medium mb-1">Position:</label>
                <input type="text" name="name" value="{{ $position->name }}" id="name" class="w-full px-3 py-2 border border-gray-300 rounded">
            </div>

            <div>
                <label for="reports_to" class="block text-gray-700 font-medium mb-1 mt-5">Reports to:</label>
                <select id="reports_to" name="reports_to" class="w-full px-3 py-2 border border-gray-300 rounded">
                    <option value="developer1">Developer 1</option>
                    <option value="developer2">Developer 2</option>
                    <option value="developer3">Developer 3</option>
                    <option value="senior_developer1">Senior Developer 1</option>
                    <option value="senior_developer2">Senior Developer 2</option>
                    <option value="development_lead">Development Lead</option>
                    <option value="manager">Manager</option>
                    <option value="qa_lead">QA Lead</option>
                    <option value="senior_qa_lead">Senior QA Lead</option>
                    <option value="qa_tester1">QA Tester 1</option>
                    <option value="qa_tester2">QA Tester 2</option>
                    <option value="ceo">CEO</option>
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 text-white mt-5 px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Submit</button>
                <a href="{{ route('position.index') }}" class="inline-flex items-center mt-5 px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Go back</a>
            </div>
        </form>
    </div>

</body>
</html>
