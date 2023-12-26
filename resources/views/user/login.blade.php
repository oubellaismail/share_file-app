<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="flex justify-center items-center h-screen bg-gray-900 text-white">
    <div class="w-96 max-w-full mx-4 md:mx-auto p-8 rounded-lg shadow-lg bg-gray-800">
        <h1 class="text-3xl font-bold mb-8">Login</h1>
        <form method="POST" action="{{ route('user.auth') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-2 font-bold text-gray-300">Email</label>
                <input id="email" type="email" class="form-input w-full bg-gray-700 text-gray-100" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-2 font-bold text-gray-300">Password</label>
                <input id="password" type="password" class="form-input w-full bg-gray-700 text-gray-100" name="password" required autocomplete="current-password">
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</button>
            </div>
            
            @if ($errors->any())
                <div class="text-red-500 text-xs mt-2">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="mt-8">
                <p class="text-gray-400 text-sm">
                Don't you have an account? 
                <a href="{{ route('user.register') }}" class="text-blue-400 hover:underline">Register</a>
            </p>
            </div>
        </form>
    </div>
</body>
</html>


