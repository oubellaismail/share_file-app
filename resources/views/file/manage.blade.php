<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Files</title>
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
        <h1 class="text-3xl font-bold mb-4">Manage Files</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($files as $file)
                <div class="bg-gray-800 p-4 rounded-lg">
                    <h2 class="text-xl font-bold mb-2">
                        <a href="{{route('file.show', $file->id)}}">
                            {{$file->title}}    
                        </a> 
                    </h2>
                    <p>Description: {{$file->description}}</p>
                    <div class="flex justify-between mt-4">
                        <form action="{{route('file.delete',  $file->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </form>
                        @if(auth()->user()->id == $file->user->id)
                            <a href="{{route('file.edit', $file->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
