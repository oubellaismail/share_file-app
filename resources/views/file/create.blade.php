<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Add File</title>
</head>
<body class="bg-gray-900 text-white flex justify-center items-center h-screen">
    <div class="bg-gray-800 rounded-lg p-6 w-full max-w-md">
        <h1 class="text-3xl font-bold mb-4 text-center">Add File</h1>
        <form method="POST" action="{{route('file.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block mb-2 font-bold text-gray-300">Title</label>
                <input id="title" type="text" class="form-input w-full bg-gray-700 text-gray-100 rounded-md p-2" name="title" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2 font-bold text-gray-300">Description</label>
                <textarea id="description" class="form-textarea w-full bg-gray-700 text-gray-100 rounded-md p-2" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="file" class="block mb-2 font-bold text-gray-300">File</label>
                <input id="file" type="file" class="form-input w-full bg-gray-700 text-gray-100 rounded-md p-2" name="file" required>
            </div>

<div class="mb-4">
    <label for="category_id" class="block mb-2 font-bold text-gray-300">Category:</label>
    <select id="category_id" name="category_id" class="shadow appearance-none border rounded w-full py-2 px-3  text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add File</button>
            </div>
        </form>
    </div>
</body>
</html>
