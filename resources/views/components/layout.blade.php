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
                <span class="mr-4">Hello, {{ auth()->user()->role_id == 2 ? "Admin " . auth()->user()->name : auth()->user()->name }}</span>
                <a href="{{ route('file.manage') }}" class="mr-4 text-blue-300 hover:text-blue-500">Manage Files</a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-blue-300 hover:text-blue-500">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('user.login') }}" class="mr-4 text-blue-300 hover:text-blue-500">Login</a>
                <a href="{{ route('user.register') }}" class="text-blue-300 hover:text-blue-500">Register</a>
            @endauth
        </div>
    </nav>
    <main>
        {{$slot}}    
    </main>
</body>
</html>
