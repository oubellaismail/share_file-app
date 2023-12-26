<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Home</title>
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
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Files</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('file.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New File</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($files as $file)
                <div class="bg-gray-800 p-4 rounded-lg">
                    <a href="/file/show/{{$file->id}}">
                         <h2 class="text-xl font-bold mb-2">{{$file->title}}</h2>
                    </a>
                    <p>{{$file->description}}</p>
                    <a href="{{$file->url}}" class="text-blue-300 hover:text-blue-500 block mt-2">Download</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
