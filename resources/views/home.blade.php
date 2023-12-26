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
                <a href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('user.login') }}" class="mr-4">Login</a>
                <a href="{{ route('user.register') }}">Register</a>
            @endauth
        </div>
    </nav>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Files</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('file.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New File</a>
        </div>
        <div class="grid grid-cols-3 gap-4">
            {{-- @foreach ($products as $product)
                <div class="bg-gray-800 p-4 rounded-lg">
                    <img src="" alt="not found !" class="mb-2">
                    <a href="" class="text-blue-500 hover:underline">Prod</a>
                </div>
            @endforeach --}}
        </div>
    </div>
</body>
</html>
