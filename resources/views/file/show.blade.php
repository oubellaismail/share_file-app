<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show File</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <nav class="flex justify-between items-center bg-gray-800 p-4">
        <div>
            <a href="{{ route('home') }}" class="text-lg font-bold">Home</a>
        </div>
        <div>
            @auth
                <span class="mr-4">Hello, {{ auth()->user()->name }}</span>
                <a href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-blue-300 hover:text-blue-500">Logout</a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                    <button type="submit" class="hidden">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('user.login') }}" class="mr-4 text-blue-300 hover:text-blue-500">Login</a>
                <a href="{{ route('user.register') }}" class="text-blue-300 hover:text-blue-500">Register</a>
            @endauth
        </div>
    </nav>
    <div class="container mx-auto p-8">
        <div class="border border-gray-700 rounded-lg p-6">
            <div class="mb-6">
                <p class="font-bold my-2">Owner: {{$file->user->name}}</p>
                <h1 class="text-3xl font-bold my-2">Title: {{ $file->title }}</h1>
                <p class="text-gray-400 mb-4">Description: {{ $file->description }}</p>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="bg-gray-600 text-gray-200 px-2 py-1 rounded">{{$file->category->name}}</span>
                </div>
            </div>
            <form action="{{route('file.download', $file->id)}}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Download File</button>
            </form>
            @error('error')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-4 rounded" role="alert">
                    <span class="font-bold block sm:inline">{{$message}}</span>
                </div>
            @enderror
        </div>
    </div>
</body>
</html>
